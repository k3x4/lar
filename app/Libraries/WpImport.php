<?php

namespace App\Libraries;

use DB;
use App\User;
use App\Role;
use App\Media;
use App\Listing;
use App\Category;
use App\Feature;
use App\FeatureGroup;
use App\Field;
use App\FieldGroup;
use App\Libraries\Tools;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use App\Libraries\Media as MediaLibrary;
use MikeMcLin\WpPassword\Facades\WpPassword;

class WpImport
{
    private $data;
    private $mapFiles;
    private $mapFilenames;
    private $oldUsers;
    private $mapUsers;
    private $mapFeatures;
    private $mapFields;

    public function getData($xmlFile){
        setlocale(LC_ALL, 'el_GR.UTF-8');

        $doc = new \DOMDocument();
        $doc->load($xmlFile);

        $this->mapFiles = [];
        $this->mapFilenames = [];

        $root = $doc->getElementsByTagName('channel')->item(0);
        $this->data = $this->xmlToArray($root);

        //file_put_contents('all.arr', var_export($this->data, true));exit();
    }

    public function xmlToArray($root) {
        $result = array();
    
        if ($root->hasAttributes()) {
            $attrs = $root->attributes;
            foreach ($attrs as $attr) {
                $result['@attributes'][$attr->name] = $attr->value;
            }
        }
    
        if ($root->hasChildNodes()) {
            $children = $root->childNodes;
            if ($children->length == 1) {
                $child = $children->item(0);
                if (in_array($child->nodeType, [XML_TEXT_NODE, XML_CDATA_SECTION_NODE])) {
                    $result['_value'] = $child->nodeValue;
                    return count($result) == 1
                        ? $result['_value']
                        : $result;
                }
            }
            $groups = array();
            foreach ($children as $child) {
                if($child->nodeType == XML_TEXT_NODE && empty(trim($child->nodeValue))) continue;
                if (!isset($result[$child->nodeName])) {
                    $result[$child->nodeName] = $this->xmlToArray($child);
                } else {
                    if (!isset($groups[$child->nodeName])) {
                        $result[$child->nodeName] = array($result[$child->nodeName]);
                        $groups[$child->nodeName] = 1;
                    }
                    $result[$child->nodeName][] = $this->xmlToArray($child);
                }
            }
        }
    
        return $result;
    }

    public function itemsFilter($items, $filter){

        $items = array_filter($items, function($value, $key) use ($filter){
            $result_array = array_intersect_assoc($value, $filter);

            if(count($result_array) == count($filter)){
                return true;
            } 

            return false;
        }, ARRAY_FILTER_USE_BOTH);

        return $items;
    }

    public function getItems($rootElem, $filters){
        if(!$this->data){
            return null;
        }

        $items = $this->itemsFilter($this->data[$rootElem], $filters);
        return $items;
    }

    public function importUsers(){
        if(!Schema::hasTable('wp_users')){
            return;
        }

        $users = DB::table('wp_users')->get();
        $this->oldUsers = $users;
        //dd($users[0]);
        
        $gmtTimezone = new \DateTimeZone('GMT');
        $dateCreated = new \DateTime($users[0]->user_registered, $gmtTimezone);
        $timezone = config('app.timezone');
        $dateCreated->setTimezone(new \DateTimeZone($timezone));

        //dd($users[0]);

        $gmtTimezone = new \DateTimeZone('GMT');
        $timezone = config('app.timezone');

        $count = count($users);
        $index = 1;

        $userRole = Role::where('name', 'user')->get()->first();

        foreach($users as $user){
            $dateCreated = new \DateTime($user->user_registered, $gmtTimezone);
            $dateCreated->setTimezone(new \DateTimeZone($timezone));
            $dateCreated = $dateCreated->format('Y-m-d H:i:s');

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Users');

            $newUser = new User();
            $newUser->email = $user->user_email;
            $newUser->password = $user->user_pass;
            $newUser->created_at = $dateCreated;
            $newUser->updated_at = $dateCreated;
            $newUser->save();

            $this->mapUsers[$user->user_login] = $newUser->id;

            $newUser->attachRole($userRole);
        }
        echo PHP_EOL;

        //exit();

        //echo $dateCreated->format('Y-m-d H:i:s');exit();

        // if ( WpPassword::check('', $users[0]->user_pass) ) {
        //    echo 'TRUE'; exit();
        // } else {
        //    echo 'FALSE'; exit();
        // }
    }

    public function importCategories(){
        $parentCategories = $this->getItems('wp:term', [
            'wp:term_taxonomy' => 'pointfinderltypes',
            'wp:term_parent' => '',
        ]);

        $count = count($parentCategories);
        $index = 1;

        foreach($parentCategories as $categoryItem){
            $category = [
                'title'     => $categoryItem['wp:term_name'],
                'slug'      => $categoryItem['wp:term_slug'],
            ];

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Parent Categories');
            Category::create($category);
        }
        echo PHP_EOL;

        $allCategories = $this->getItems('wp:term', [
            'wp:term_taxonomy' => 'pointfinderltypes',
        ]);

        $count = count($allCategories);
        $index = 1;

        foreach($allCategories as $categoryItem){
            if(!$categoryItem['wp:term_parent']){
                $count--;
                continue;
            }
           
            $parentId = Category::where('slug', '=', $categoryItem['wp:term_parent'])->first()->id;
            $category = [
                'title'     => $categoryItem['wp:term_name'],
                'slug'      => $categoryItem['wp:term_slug'],
                'category_id' => $parentId ? $parentId : null
            ];

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Child Categories');
            Category::create($category);
        }
        echo PHP_EOL;
    }

    public function importFeatures(){
        // $features = $this->getItems('wp:term', [
        //     'wp:term_taxonomy' => 'pointfinderfeatures',
        // ]);

        // foreach($features as $feature){
        //     file_put_contents('fe.arr', $feature['wp:term_name'] . PHP_EOL, FILE_APPEND);
        // }
        // exit();

        $featureMapGroup = [
            'ABS'                                   => 2,
            'Air Condition'                         => 2,
            'Air Condition'                         => 1,
            'Bluetooth'                             => 2,
            'CD Player'                             => 2,
            'DVD Player'                            => 2,
            'ESP'                                   => 2,
            'Immobilizer'                           => 2,
            'Ανεμιστήρας οροφής'                    => 1,
            'Αποθήκη'                               => 1,
            'Αυτόματος κλιματισμός'                 => 2,
            'Βεράντα'                               => 1,
            'Βιβλίο service'                        => 2,
            'Διπλά τζάμια'                          => 1,
            'Ενεργή Σύνδεση Ηλεκτρικού Ρεύματος'    => 1,
            'Ζάντες αλουμινίου'                     => 2,
            'Ηλεκτρικοί καθρέπτες'                  => 2,
            'Θέρμανση'                              => 1,
            'Κεντρικό κλείδωμα'                     => 2,
            'Μπάρμπεκιου'                           => 1,
            'Πάρκινγκ'                              => 1,
            'Πισίνα'                                => 1,
            'Πλοηγός'                               => 2,
            'Πόρτα ασφαλείας'                       => 1,
            'Προβολείς ομίχλης'                     => 2,
            'Σοφίτα'                                => 1,
            'Τζάκι'                                 => 1,
            'Υδραυλικό τιμόνι'                      => 2,
            'Υποβοήθηση φρένων'                     => 2,
        ];

        $count = count($featureMapGroup);
        $index = 1;

        FeatureGroup::create(['title' => 'Ακίνητο']);
        FeatureGroup::create(['title' => 'Αυτοκίνητο']);

        $this->mapFeatures = [];
        
        foreach($featureMapGroup as $featureTitle => $groupId){
            Tools::echoing('Import ' . $index++ . '/' . $count . ' Features');
            //Feature::create(['title' => $featureTitle, 'feature_group_id' => $groupId]);
            $feature = new Feature();
            $feature->title = $featureTitle;
            $feature->feature_group_id = $groupId;
            $feature->save();
            $this->mapFeatures[$featureTitle] = $feature->id;
        }
        echo PHP_EOL;

    }

    public function importCustomFields(){
        $customFields = [
            'Τύπος'         => [
                'oldField'  => 'webbupointfinder_item_field_proptype',
                'type'      => 'select',
                'options'   => [
                    'values' => [
                        '1' => 'Studio / Γκαρσονιέρα',
                        '2' => 'Διαμέρισμα',
                        '3' => 'Μεζονέτα',
                        '4' => 'Μονοκατοικία',
                    ],
                    'default' => '1'
                ]
            ],
            'Τιμή'          => [
                'oldField'  => 'webbupointfinder_item_field283070149872418420000',
                'type'      => 'number',
                'options'   => [
                    'prefix' => null,
                    'suffix' => '€',
                    'default' => null
                ]
            ],
            'Όροφος'        => [
                'oldField'  => 'webbupointfinder_item_field70165663575622040000',
                'type'      => 'select',
                'options'   => [
                    'values' => [
                        ''  => 'Επιλέξτε',
                        '1' => 'Υπόγειο',
                        '2' => 'Ημιυπόγειο',
                        '3' => 'Ισόγειο',
                        '4' => 'Ημιώροφος',
                        '5' => '1ος',
                        '6' => '2ος',
                        '7' => '3ος',
                        '8' => '4ος',
                        '9' => '5ος',
                        '10' => '6ος',
                        '11' => '7ος',
                        '12' => '8ος',
                        '13' => '9ος',
                        '14' => '10ος',
                    ],
                    'default' => null
                ]
            ],
            'Τετρ. Μέτρα'   => [
                'oldField'  => 'webbupointfinder_item_field287084981110235630000',
                'type'      => 'number',
                'options'   => [
                    'prefix' => null,
                    'suffix' => 'τμ',
                    'default' => null
                ]
            ],
            'Δωμάτια'       => [
                'oldField'  => 'webbupointfinder_item_field930250379806436500000',
                'type'      => 'number',
                'options'   => [
                    'prefix' => null,
                    'suffix' => null,
                    'default' => null
                ]
            ],
            'Θέρμανση'      => [
                'oldField'  => 'webbupointfinder_item_field377217164104565400000',
                'type'      => 'select',
                'options'   => [
                    'values' => [
                        '1' => 'Χωρίς Θέρμανση',
                        '2' => 'Με κλιματιστικά',
                        '3' => 'Αυτόνομη θέρμανση',
                        '4' => 'Κεντρική θέρμανση',
                        '5' => 'Θέρμανση με χρήση υγραερίου',
                        '6' => 'Σόμπα',
                        '7' => 'Θερμοσυσσωρευτής',
                    ],
                    'default' => '1'
                ]
            ],
            'Διεύθυνση'     => [
                'oldField'  => 'webbupointfinder_item_field454305059116910000000',
                'type'      => 'textbox',
                'options'   => [
                    'prefix' => null,
                    'suffix' => null,
                    'placeholder' => 'Διεύθυνση',
                    'default' => null,
                ]
            ]
        ];
        
        $count = count($customFields);
        $index = 1;

        FieldGroup::create(['title' => 'Ακίνητο']);

        $this->mapFields = [];
        
        foreach($customFields as $fieldTitle => $fieldArray){
            Tools::echoing('Import ' . $index++ . '/' . $count . ' Fields');
            $field = new Field();
            $field->title = $fieldTitle;
            $field->field_group_id = 1;
            $field->type = $fieldArray['type'];
            $field->options = serialize($fieldArray['options']);
            $field->save();
            $oldField = $fieldArray['oldField'];
            $this->mapFields[$oldField] = $field->id;
        }
        echo PHP_EOL;

    }

    public function downloadFiles(){
        $tempPath = public_path('temp');

        if (!is_dir($tempPath)) {
            mkdir($tempPath, 0777);
        } else {
            return true;
        }

        $files = $this->getItems('item', [
            'wp:post_type' => 'attachment'
        ]);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['wp:attachment_url'];
            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));

            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            if (!is_dir(dirname($filename))) {
                mkdir(dirname($filename), 0777, true);
            }

            $url = mb_convert_encoding($url, 'UTF-8', mb_detect_encoding($url, 'UTF-8', true));

            Tools::echoing('Download ' . $index++ . '/' . $count . ' File');

            $ch = curl_init($url);
            $fp = fopen($filename, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);
            fclose($fp);
        }
        echo PHP_EOL;
        
    }

    // public function mapListingFiles(){
    //     $files = $this->getItems('item',[
    //         'wp:post_type' => 'attachment'
    //     ]);

    //     $this->listingFiles = [];

    //     $count = count($files);
    //     $index = 1;

    //     foreach($files as $file){
    //         $fileId = intval($file['wp:post_parent']);

    //         Tools::echoing('Map ' . $index++ . '/' . $count . ' Files');
    //         $this->listingFiles[$fileId][] = intval($file['wp:post_id']);
    //     }
    //     echo PHP_EOL;
    //     //file_put_contents('map.arr', var_export($this->listingFiles, true));
    // }

    private function filterMeta($item, $metaKey, $integerValues = false, $oldFiles = false){
        $result = [];

        if(isset($item['wp:postmeta'])){
            $metas = $item['wp:postmeta'];
            foreach($metas as $meta){
                if($meta['wp:meta_key'] == $metaKey){
                    $result[] = $meta['wp:meta_value'];
                }
            }
        }

        if($integerValues && $result){
            $result = array_map('intval', $result);
        }

        if($oldFiles && $result){
            $result = array_map([$this, 'mapFiles'], $result);
        }

        return $result ? $result : null;
    }

    public function mapFiles($item){
        return isset($this->mapFiles[$item]) ? $this->mapFiles[$item] : $item;
    }

    public function mapFilesContent($content){
        foreach($this->mapFilenames as $oldPath => $newPath){
            $content = str_replace($oldPath, $newPath, $content);
        }
        return $content;
    }

    public function storeFiles(){
        $files = $this->getItems('item',[
            'wp:post_type' => 'attachment',
        ]);

        $tempPathOrig = public_path('temp');
        $tempPath = public_path('temp1');

        if (is_dir($tempPath)) {
            Tools::removeDir($tempPath);
        }

        Tools::copyDir($tempPathOrig, $tempPath);

        $count = count($files);
        $index = 1;

        foreach($files as $file){
            $url = $file['wp:attachment_url'];
            $filename = parse_url($url);
            $filename = $filename['path'];
            $filename = $tempPath . $filename;

            // if(!Tools::isImage($filename)){
            //     continue;
            // }

            $fileObj = new UploadedFile(
                $filename,
                basename($filename),
                mime_content_type($filename),
                filesize($filename),
                null,
                true
            );

            Tools::echoing('Store ' . $index++ . '/' . $count . ' Files');
            $oldFileId = intval($file['wp:post_id']);
            $newMedia = MediaLibrary::store($fileObj, 1);
            $this->mapFiles[$oldFileId] = $newMedia->id;
            $this->mapFilenames[$url] = url('/uploads') . '/' . $newMedia->filename;
        }
        echo PHP_EOL;

    }

    private function getCategoryItem($listingItemCategory){
        if(
            isset($listingItemCategory['@attributes']) &&
            isset($listingItemCategory['@attributes']['nicename']) &&
            isset($listingItemCategory['@attributes']['domain']) == 'pointfinderltypes'
        ){
            $category = Category::where('slug', '=', $listingItemCategory['@attributes']['nicename'])->first();
            if($category){
                return $category->id;
            }
        }

        return null;
    }

    private function getListingCategory($listingItem){
        $categoryId = null;
            
        if(!isset($listingItem['category'])){
            return null;
        }

        if(!is_array($listingItem['category'])){
            return null;
        }

        $categoryItemsCount = count($listingItem['category']);

        if(isset($listingItem['category']['@attributes'])){ // 1 ITEM
            return $this->getCategoryItem($listingItem['category']);
        } else {
            foreach($listingItem['category'] as $categoryItem){
                $categoryId = $this->getCategoryItem($categoryItem);
                if($categoryId){
                    break;
                }
            }
        }

        return $categoryId;
    }

    public function importListings(){
        $listingItems = $this->getItems('item', [
            'wp:post_type' => 'listing',
            //'wp:status' => 'publish'
        ]);


        $files = $this->getItems('item', [
            'wp:post_type' => 'attachment',
        ]);

        $count = count($listingItems);
        $index = 1;

        foreach($listingItems as $listingItem){
            if($listingItem['wp:status'] == 'draft'){
                if(is_array($listingItem['title'])){
                    continue;
                }
                $slug = Tools::slug($listingItem['title']);
            } else {
                if(!trim($listingItem['title'])){
                    continue;
                }
                $slug = trim($listingItem['link']);
                $slug = trim($slug, '/');
                $slug = explode('/', $slug);
                $slug = end($slug);

                $slug = urldecode($slug);
                $slug = Tools::slug($slug);
            }

            $categoryId = $this->getListingCategory($listingItem);

            $featuredImage = null;
            $featuredImage = $this->filterMeta($listingItem, '_thumbnail_id', true, true);
            $featuredImage = $featuredImage ? current($featuredImage) : null;

            $listingContent = $listingItem['content:encoded'] ? $this->mapFilesContent($listingItem['content:encoded']) : null;
            
            $dateCreated = \DateTime::createFromFormat('Y-m-d H:i:s', $listingItem['wp:post_date']);
            $dateCreated = $dateCreated->getTimestamp();

            $oldAuthor = trim($listingItem['dc:creator']);
            if($oldAuthor){
                $authorId = $this->mapUsers[$oldAuthor];
            } else {
                $authorId = 1;
            }

            $listing = new Listing();
            $listing->title         = $listingItem['title'];
            $listing->slug          = $slug;
            $listing->author_id     = $authorId;
            $listing->category_id   = $categoryId;
            $listing->image_id      = $featuredImage;
            $listing->content       = $listingContent;
            $listing->status        = $listingItem['wp:status'];
            $listing->created_at    = $dateCreated;
            $listing->updated_at    = $dateCreated;
            $listing->save();

            $gallery = null;
            $gallery = $this->filterMeta($listingItem, 'webbupointfinder_item_images', true, true);
            if($gallery){
                $listing->meta()->create([
                    'meta_key' => 'gallery',
                    'meta_value' => serialize($gallery)
                ]);
            }
            if($featuredImage){
                $gallery[] = intval($featuredImage);
            }
            $listing->media()->sync($gallery);
            
            // author media
            $mediaGallery = Media::find($gallery);
            if($mediaGallery){
                foreach($mediaGallery as $media){
                    $media->author_id = $authorId;
                    $media->save();
                }
            }

            $address = null;
            $address = $this->filterMeta($listingItem, 'webbupointfinder_items_address');
            if($address){
                $listing->meta()->create([
                    'meta_key' => 'address',
                    'meta_value' => current($address)
                ]);
            }

            $views = null;
            $views = $this->filterMeta($listingItem, 'views', true);
            if($views){
                $listing->meta()->create([
                    'meta_key' => 'views',
                    'meta_value' => current($views)
                ]);
            }

            $box = null;
            $box = $this->filterMeta($listingItem, 'webbupointfinder_item_custombox1');
            if($box){
                $box = $this->mapFilesContent(current($box));
                $listing->meta()->create([
                    'meta_key' => 'custombox1',
                    'meta_value' => $box
                ]);
            }

            $box = null;
            $box = $this->filterMeta($listingItem, 'webbupointfinder_item_custombox2');
            if($box){
                $box = $this->mapFilesContent(current($box));
                $listing->meta()->create([
                    'meta_key' => 'custombox2',
                    'meta_value' => $box
                ]);
            }

            $box = null;
            $box = $this->filterMeta($listingItem, 'webbupointfinder_item_custombox3');
            if($box){
                $box = $this->mapFilesContent(current($box));
                $listing->meta()->create([
                    'meta_key' => 'custombox3',
                    'meta_value' => $box
                ]);
            }

            $box = null;
            $box = $this->filterMeta($listingItem, 'webbupointfinder_item_custombox4');
            if($box){
                $box = $this->mapFilesContent(current($box));
                $listing->meta()->create([
                    'meta_key' => 'custombox4',
                    'meta_value' => $box
                ]);
            }

            
            // FEATURES 
            $features = [];
            if(isset($listingItem['category']) && is_array($listingItem['category'])){
                if(isset($listingItem['category']['@attributes'])){ // 1 ITEM
                    if($listingItem['category']['@attributes']['domain'] == 'pointfinderfeatures'){
                        $featureTitle = $listingItem['category']['_value'];
                        $features[] = $this->mapFeatures[$featureTitle];
                    }
                } else {
                    foreach($listingItem['category'] as $categoryItem){
                        if($categoryItem['@attributes']['domain'] == 'pointfinderfeatures'){
                            $featureTitle = $categoryItem['_value'];
                            $features[] = $this->mapFeatures[$featureTitle];
                        }
                    }
                }
            }
            $listing->features()->sync($features);


            // FIELDS
            foreach($this->mapFields as $fieldOldValue => $fieldNewKey){
                $fieldValues = $this->filterMeta($listingItem, $fieldOldValue);
                if($fieldValues){
                    $listing->fields()->attach([
                        $fieldNewKey => [
                            'value' => current($fieldValues)
                        ]
                    ]);
                }
            }
            

            Tools::echoing('Import ' . $index++ . '/' . $count . ' Listings');
            //Listing::create($listing);

        }
        echo PHP_EOL;
    }

    public function addCategoryIcons(){
        $cateogoryIcons = [
            'auto-moto'     => 'fa-car',
            'real-estate'   => 'fa-home',
            'education'     => 'fa-graduation-cap',
            'biz'           => 'fa-store',
            'jobs'          => 'fa-tasks',
            'sale'          => 'fa-shopping-cart',
            'services'      => 'fa-user-cog',
            'donate'        => 'fa-gift'
        ];

        $categories = Category::whereNull('category_id')->get();

        foreach($categories as $category){
            $category->icon = $cateogoryIcons[$category->slug];
            $category->save();
        }
    }

    public function import(){
        $this->importUsers();
        $this->importCategories();
        $this->importFeatures();
        $this->importCustomFields();
        $this->downloadFiles();
        //$this->mapListingFiles(); // REQUIRED?
        $this->storeFiles();
        $this->importListings();
        return true;
    }

}
