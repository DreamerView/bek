<?php
    ob_start("ob_gzhandler");
    $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
    $langPage = require_once($rootPage."/panel/modules/language.php"); 
    $Image = require_once($rootPage."/panel/modules/image.php");
    $linkPage = require_once($rootPage."/panel/modules/link.php");
    $actionPage = json_decode(file_get_contents($rootPage.'/panel/translate/action.json'),true);
    $skrt = json_decode(file_get_contents($rootPage.'/panel/translate/pages/skrt.json'),true);
    $skrtList = json_decode(file_get_contents($rootPage.'/panel/translate/pages/skrt-list.json'),true);
    ob_end_clean();
?>

    <?php require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($skrt['title'][$langPage],$skrt['content'][$langPage]);?>

    <body>
        <?php require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <section class="landingPromo">
                <div class="landingPromoTitle">
                    <h1><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $skrt['title'][$langPage]);?></h1>
                    <p><?=$skrt['content'][$langPage];?></p>
                </div>
                <div class="landingRow">
                    <?php foreach($skrtList as $row) { ?> 
                        <div class="landingRowBlock">
                            <div class="landingRowBack"></div>
                            <?=$Image("/images/skrt/minified/".$row['key'].".webp",$row['title'][$langPage]);?>
                            <div class="landingRowContent"><h2><?=$row['title'][$langPage];?></h2><?=$linkPage("/skrt-solutions/".$row['key'],$actionPage['more'][$langPage],$row['title'][$langPage],"redButton btn-glow","");?></div>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <?php require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <?php require_once($rootPage."/panel/component/main/statistics.php");?>
            <?php require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <?php require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>