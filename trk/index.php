<?php
    ob_start("ob_gzhandler");
    $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
    $langPage = require_once($rootPage."/panel/modules/language.php"); 
    $Image = require_once($rootPage."/panel/modules/image.php");
    $linkPage = require_once($rootPage."/panel/modules/link.php");
    $actionPage = json_decode(file_get_contents($rootPage.'/panel/translate/action.json'),true);
    $trk = json_decode(file_get_contents($rootPage.'/panel/translate/pages/trk.json'),true);
    ob_end_clean();
?>

    <?php require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($trk['title'][$langPage],$trk['content'][$langPage]);?>

    <body>
        <?php require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <section class="landingPromo">
                <div class="landingPromoTitle">
                    <h1><?=preg_replace('/^[^\s]+/', '<mark><b>$0</b></mark>', $trk['title'][$langPage]);?></h1>
                    <p><?=$trk['content'][$langPage];?></p>
                </div>
                <div class="landingPromoContent">
                    <div><?=$Image('/images/icons/info_outline.svg','Icon SVG');?><p><?=$trk['quote'][$langPage];?></p></div>
                </div>
                <? if(isset($trk['video'])): ?>
                    <video width="100%" height="auto" controls preload="none" poster="/video/poster.webp">
                        <source src="<?=$trk['video'];?>" type="video/mp4">
                            Your browser does not support the video tag.
                    </video>
                <? endif; ?>            
            </section>
            <section class="solutions">
                <div class="titleSection">
                    <h2><?=preg_replace('/^[^\s]+/', '<mark><b>$0</b></mark>', $trk['solution_title'][$langPage]);?></h2>
                    <p><?=$trk['solution_content'][$langPage];?></p>
                    <div class="underline"></div>
                </div>
                <div class="solutions_row">
                    <? foreach($trk['solution_list'] as $row): ?>
                        <div class="solutions_block">
                            <?=$Image($row['img'],$row['title'][$langPage]);?>
                            <div>
                                <h3><?=$row['title'][$langPage];?></h3>
                                <span><?=$row['content'][$langPage];?></span>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </section>
            <?php require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <?php require_once($rootPage."/panel/component/main/statistics.php");?>
            <?php require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <?php require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>