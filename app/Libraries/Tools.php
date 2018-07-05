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
