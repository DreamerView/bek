<?
function landingWelcomeModule() {
    ob_start("ob_gzhandler");
    {
        $rootModule = realpath($_SERVER["DOCUMENT_ROOT"]);
        $ImageModule = require($rootModule."/panel/modules/image.php");
        $langModule = require($rootModule."/panel/modules/language.php");
        $linkModule = require($rootModule."/panel/modules/link.php");
        $actionModule = json_decode(file_get_contents($rootModule.'/panel/translate/action.json'),true);
        $landingWelcome = json_decode(file_get_contents($rootModule.'/panel/translate/components/landingWelcome.json'),true);
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
<!-- <section class="landingContent">
    <div>
        <div class="landingRightContentText">
            <h2><?=preg_replace('/(?<=\>)\b\w*\b|^\w*\b/', '<mark><b>$0</b></mark>', $landingWelcome['title'][$langModule]);?></h2>
            <p><?=$landingWelcome['content'][$langModule];?></p>
            <?=$linkModule('/about-us/',$actionModule['more'][$langModule],$landingWelcome['title'][$langModule],'redButton btn-glow','');?>
        </div>
        <div class="landingRightContentImage">
            <?=$ImageModule("/images/Capture.webp",$landingWelcome['title'][$langModule]);?>
        </div>
    </div>
</section> -->
<section class="titleLanding">
                <h2>
                    <?=preg_replace('/(?<=\>)\b\w*\b|^\w*\b/', '<mark><b>$0</b></mark>', $landingWelcome['title'][$langModule]);?>
                </h2>
                <p>
                    <?=$landingWelcome['content'][$langModule];?>
                </p>
                <?=$linkModule('/about-us/',$actionModule['more'][$langModule],$landingWelcome['title'][$langModule],'redButton btn-glow','');?>
</section>
<? } ob_flush(); 
    }
    landingWelcomeModule();
?>
