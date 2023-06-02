<? $SEO = function($title,$description) {
    ob_start("ob_gzhandler");
    {
        // Display error
        ini_set('display_errors', 1); 
        ini_set('display_startup_errors', 1); 
        error_reporting(E_ALL);
        // Display error
        $root = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $lang = require($root."/panel/modules/language.php");
        $getInfo = file_get_contents($root.'/panel/database/info.json'); 
        $info = json_decode($getInfo,true);
        $url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
        $link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if($description === '') $description = $info['content'][$lang];
        $titleResult = $title." - ".$info['name'][$lang];
        $descriptionResult = substr($description, 0, 148)." [...]";
        $shortname = "bekz.kz";
        $linkLanguage = (str_contains($link,'?lang='))?str_replace("?lang=".$lang, "",$link):$link;
    }
    ob_end_clean();
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>" xml:lang="<?=$lang;?>" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$url;?>/style.css?version=<?=filemtime($root."/style.css");?>">
    <link rel="stylesheet" href="<?=$url;?>/animation.css?version=<?=filemtime($root."/animation.css");?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="manifest" href="<?=$url;?>/manifest.webmanifest">
    <meta name="document-state" content="Static" />
    <meta http-equiv="content-language" content="<?=$lang;?>" />
    <meta name="theme-color" content="#fff" media="(prefers-color-scheme: light)"/>
    <meta name="theme-color" content="#1C1C1E" media="(prefers-color-scheme: dark)"/>

    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="author" content="<?=$info['name'][$lang];?>">
    <link rel="publisher" href="<?=$info['name'][$lang];?>" />
    <link rel="canonical" href="<?=$link;?>" />
    
    <!-- Facebook SEO -->
    <meta property="og:url" content="<?=$link;?>" />
    <meta property="og:locale" content="<?=$lang;?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$titleResult;?>" />
    <meta property="og:site_name" content="<?=$titleResult;?>" />
    <meta property="og:description" content="<?=$descriptionResult;?>" />
    <meta property="og:image" content="<?=$url."/share.jpg";?>" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="<?=$titleResult;?>" />
    <meta name="og:email" content="<?=$info['email'];?>"/>
    <meta name="og:phone_number" content="<?=$info['phoneShort'];?>"/>
    <meta name="og:fax_number" content="<?=$info['phoneShort'];?>"/>
    <meta name="og:street-address" content="<?=$info['location'][$lang];?>"/>
    <meta name="og:locality" content="Karagandy"/>
    <meta name="og:region" content="Karagandy"/>
    <meta name="og:postal-code" content="100000"/>
    <meta name="og:country-name" content="Kazakhstan"/>
    <link rel="image_src" href="<?=$url."/share.jpg";?>" width="400" height="300"/>
    <!-- Facebook SEO -->
    
    <!-- Twitter SEO -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?=$titleResult;?>" />
    <meta name="twitter:description" content="<?=$descriptionResult;?>" />
    <meta name="twitter:url" content="<?=$link;?>" />
    <meta name="twitter:image" content="<?=$url."/share.jpg";?>" />
    <meta property="twitter:image:width" content="400" />
    <meta property="twitter:image:height" content="300" />
    <meta name="twitter:image:alt" content="<?=$titleResult;?>" />
    <meta name="twitter:creator" content="@<?=$shortname;?>" />
    <meta name="twitter:site" content="@<?=$shortname;?>" />
    <!-- Twitter SEO -->

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="<?=$titleResult;?>">
    <meta itemprop="description" content="<?=$descriptionResult;?>">
    <meta itemprop="image" content="<?=$url."/share.jpg";?>">

    <!-- Apple Touch Screen -->
    <link rel="apple-touch-startup-image" media="screen and (device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_14_Pro_Max_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_14_Pro_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_14_Plus__iPhone_13_Pro_Max__iPhone_12_Pro_Max_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_14__iPhone_13_Pro__iPhone_13__iPhone_12_Pro__iPhone_12_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_13_mini__iPhone_12_mini__iPhone_11_Pro__iPhone_XS__iPhone_X_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_11_Pro_Max__iPhone_XS_Max_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_11__iPhone_XR_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/iPhone_8__iPhone_7__iPhone_6s__iPhone_6__4.7__iPhone_SE_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/4__iPhone_SE__iPod_touch_5th_generation_and_later_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/12.9__iPad_Pro_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/11__iPad_Pro__10.5__iPad_Pro_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 820px) and (device-height: 1180px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/10.9__iPad_Air_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/10.5__iPad_Air_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/10.2__iPad_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/9.7__iPad_Pro__7.9__iPad_mini__9.7__iPad_Air__9.7__iPad_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 744px) and (device-height: 1133px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?=$url;?>/images/splash_screens/8.3__iPad_Mini_landscape.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_14_Pro_Max_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_14_Pro_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_14_Plus__iPhone_13_Pro_Max__iPhone_12_Pro_Max_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_14__iPhone_13_Pro__iPhone_13__iPhone_12_Pro__iPhone_12_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_13_mini__iPhone_12_mini__iPhone_11_Pro__iPhone_XS__iPhone_X_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_11_Pro_Max__iPhone_XS_Max_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_11__iPhone_XR_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/iPhone_8__iPhone_7__iPhone_6s__iPhone_6__4.7__iPhone_SE_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/4__iPhone_SE__iPod_touch_5th_generation_and_later_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/12.9__iPad_Pro_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/11__iPad_Pro__10.5__iPad_Pro_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 820px) and (device-height: 1180px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/10.9__iPad_Air_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/10.5__iPad_Air_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/10.2__iPad_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/9.7__iPad_Pro__7.9__iPad_mini__9.7__iPad_Air__9.7__iPad_portrait.png">
    <link rel="apple-touch-startup-image" media="screen and (device-width: 744px) and (device-height: 1133px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?=$url;?>/images/splash_screens/8.3__iPad_Mini_portrait.png">
    <!-- Apple Touch Screen -->

    <!-- Apple UI -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?=$url;?>/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=$url;?>/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=$url;?>/apple-touch-icon-72x72.png">    
    <link rel="apple-touch-icon" sizes="144x144" href="<?=$url;?>/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=$url;?>/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=$url;?>/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=$url;?>/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$url;?>/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$url;?>/apple-touch-icon.png">
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$url;?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$url;?>/favicon-16x16.png">
    <link rel="mask-icon" href="<?=$url;?>/safari-pinned-tab.svg" color="#ff2d55">
    <meta name="msapplication-TileColor" content="#ff2d55">
    <!-- Apple UI -->

    <!-- Apple App Name -->
    <meta name="apple-mobile-web-app-title" content="<?=$info['shortName'];?>" />
    <meta name="application-name" content="<?=$info['shortName'];?>" />
    <!-- Apple App Name -->

    <!-- Alternate language support -->
    <? foreach($info['languageSupport'] as $result):?>
        <link rel="alternate" href="<?=$linkLanguage;?>?lang=<?=$result;?>" hreflang="<?=$result;?>" />
    <? endforeach;?>
    <!-- Alternate language support -->

    <title><?=$titleResult;?></title>
    <meta name="description" content="<?=$descriptionResult;?>"/>
</head>
<? 
} ?>