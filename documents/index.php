<?
    ob_start("ob_gzhandler");
    {
        $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
        $langPage = require_once($rootPage."/panel/modules/language.php");
        $Image = require_once($rootPage."/panel/modules/image.php");
        $pages = ['technoton','escort','pateoc','vesa','bek'];
        $show = array('technoton'=>'TECHNOTON','escort'=>'ESCORT','pateoc'=>'PATEOC','vesa'=>'VESA','bek'=>'BEK');
        $linkPage = require_once($rootPage."/panel/modules/link.php");
        $documents = json_decode(file_get_contents($rootPage.'/panel/translate/pages/documents.json'),true);
        $actionPage = json_decode(file_get_contents($rootPage.'/panel/translate/action.json'),true);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($documents['title'][$langPage],$documents['content'][$langPage]);?>

    <body>
        <? require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <section class="landingPromo">
                <div class="landingPromoTitle">
                    <h1><?=$documents['title'][$langPage];?></h1>
                    <p><?=$documents['content'][$langPage];?></p>
                </div>
                <div class="landingRow">
                    <? foreach($pages as $result) : ?> 
                        <div class="landingRowBlock">
                            <div class="landingRowBack"></div>
                            <?=$Image("/images/equipment/list/".$result.".webp",$show[$result]);?>
                            <div class="landingRowContent"><h2><?=$show[$result];?></h2><?=$linkPage("/documents-list/".$result,$actionPage['more'][$langPage],$show[$result],"redButton btn-glow","");?></div>
                        </div>
                    <? endforeach; ?>
                </div>
            </section>
            <? require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <? require_once($rootPage."/panel/component/main/statistics.php");?>
            <? require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>