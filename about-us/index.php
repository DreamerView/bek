<?
    ob_start("ob_gzhandler");
    {
    $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
    $Image = require_once($rootPage."/panel/modules/image.php");
    $langPage = require_once($rootPage."/panel/modules/language.php");
    $pageInfo = json_decode(file_get_contents($rootPage.'/panel/translate/pages/aboutUs.json'),true);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($pageInfo['title'][$langPage],$pageInfo['content'][$langPage]);?>

    <body>
        <? require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <section class="landingPromo">
                <div class="landingPromoTitle">
                    <h1><?=$pageInfo['titlePage'][$langPage];?></h1>
                    <p>
                        <?=$pageInfo['content'][$langPage];?>
                    </p>
                </div>
                <div class="landingPromoContent">
                    <? foreach($pageInfo['present'] as $row): ?>
                    <div><?=$Image($row['img'],'Icon SVG');?><p><?=$row['title'][$langPage];?></p></div>
                    <? endforeach; ?>
                </div>
            </section>
            <div class="mapResult">
                <iframe loading="lazy" src="https://yandex.ru/map-widget/v1/?um=constructor%3Ab928d4906bcdbbdbe47bb0fb2a48539dc54d3f755472ac82dcc00e07e46469d8&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
            <? require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <? require_once($rootPage."/panel/component/main/statistics.php");?>
            <? require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>