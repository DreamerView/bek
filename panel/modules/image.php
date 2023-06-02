<?
    return function($src,$title) {
        ob_start('ob_gzhandler');
        {
            $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
            $root = realpath($_SERVER["DOCUMENT_ROOT"]);
            $source = $root.$src;
            $check = pathinfo($source)['extension'];
            $srcResult = $url.$src;
            $titleResult = $title;
            if($check==='svg') {
                $svg = simplexml_load_file($source);
                $attr = $svg->attributes();
                $width=$attr->width;
                $height=$attr->height;
            } else {
                $info = getimagesize($source);
                list($width, $height) = getimagesize($source);
            }
        }
        ob_end_clean();
        return "<img loading='lazy' 
                     src='".$srcResult."?version=".filemtime($source)."'
                     srcSet='".$srcResult."?version=".filemtime($source)."'
                     width='".$width."' 
                     height='".$height."' 
                     alt='".$titleResult."'  
                     title='".$titleResult."'
                     role='img'
                />";
    }
?>