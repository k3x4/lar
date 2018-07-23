<?php

namespace App\Libraries;

class Tools
{

    public static function greeklishSlugs($text) {

        $expressions = array(
            '/[αΑ][ιίΙΊ]/u' => 'ai',
            //'/[οΟ][ιίΙΊ]/u' => 'ei',
            //'/[Εε][ιίΙΊ]/u' => 'oi',
    
            '/[αΑ][υύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'af$1',
            '/[αΑ][υύΥΎ]/u' => 'av',
            '/[εΕ][υύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'ef$1',
            '/[εΕ][υύΥΎ]/u' => 'ev',
            '/[οΟ][υύΥΎ]/u' => 'ou',
    
            //'/(^|\s)[μΜ][πΠ]/u' => '$1b',
            //'/[μΜ][πΠ](\s|$)/u' => 'b$1',
            '/[μΜ][πΠ]/u' => 'mp',
            '/[νΝ][τΤ]/u' => 'nt',
            '/[τΤ][σΣ]/u' => 'ts',
            '/[τΤ][ζΖ]/u' => 'tz',
            '/[γΓ][γΓ]/u' => 'ng',
            '/[γΓ][κΚ]/u' => 'gk',
            '/[ηΗ][υΥ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'if$1',
            '/[ηΗ][υΥ]/u' => 'iu',
    
            '/[θΘ]/u' => 'th',
            '/[χΧ]/u' => 'ch',
            '/[ψΨ]/u' => 'ps',
    
            '/[αάΑΆ]/u' => 'a',
            '/[βΒ]/u' => 'v',
            '/[γΓ]/u' => 'g',
            '/[δΔ]/u' => 'd',
            '/[εέΕΈ]/u' => 'e',
            '/[ζΖ]/u' => 'z',
            '/[ηήΗΉ]/u' => 'i',
            '/[ιίϊΙΊΪ]/u' => 'i',
            '/[κΚ]/u' => 'k',
            '/[λΛ]/u' => 'l',
            '/[μΜ]/u' => 'm',
            '/[νΝ]/u' => 'n',
            '/[ξΞ]/u' => 'ks',
            '/[οόΟΌ]/u' => 'o',
            '/[πΠ]/u' => 'p',
            '/[ρΡ]/u' => 'r',
            '/[σςΣ]/u' => 's',
            '/[τΤ]/u' => 't',
            '/[υύϋΥΎΫ]/u' => 'y',
            '/[φΦ]/iu' => 'f',
            '/[ωώ]/iu' => 'o',
    
            '/[«]/iu' => '',
            '/[»]/iu' => ''
        );
    
        // Translitaration
        $text = preg_replace(
            array_keys( $expressions ),
            array_values( $expressions ),
            $text
        );
    
        return $text;
    }

    public static function echoing($text){
        echo $text . "\r";
        @ob_flush();
        @flush();
    }

    public static function copyDir($source, $dest){
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }
        
        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            self::copyDir("$source/$entry", "$dest/$entry");
        }

        // Clean up
        $dir->close();
        return true;
    }

    public static function removeDir($dir) { 
        if (is_dir($dir)) { 
          $objects = scandir($dir); 
          foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
              if (is_dir($dir."/".$object))
                self::removeDir($dir."/".$object);
              else
                unlink($dir."/".$object); 
            } 
          }
          rmdir($dir); 
        } 
    }

    public static function isImage($path){
		$a = getimagesize($path);
		$image_type = $a[2];
     
		if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
		{
			return true;
		}
		return false;
	}

    public static function checkExistsSlug($slug){
        $check = \App\Listing::where('slug', '=', $slug)->exists() ||
                 \App\Category::where('slug', '=', $slug)->exists();

        return $check;
    }

    public static function slug($text) {
        $text = self::greeklishSlugs($text);
        $text = trim($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9 -]+/', '', $text);
        $text = str_replace('.', ' ', $text);
        $slug = str_replace(' ', '-', $text);

        $index = 0;
        $tempSlug = $slug;

        $exists = self::checkExistsSlug($slug);
        while($exists){
            $index++;
            $slug = $tempSlug . '-' . $index;
            $exists = self::checkExistsSlug($slug);
        }
        
        return $slug;
    }

    

}
