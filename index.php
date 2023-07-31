<?
    ob_start("ob_gzhandler");
    {
        $rootPage = realpath($_SERVER["DOCUMENT_root"]);
        $langPage = require_once($rootPage."/panel/modules/language.php");
        $pageInfo = json_decode(file_get_contents($rootPage.'/panel/translate/pages/home.json'),true);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($pageInfo['title'][$langPage],$pageInfo['content'][$langPage]);?>

    <body>
        <div class="fullImage"></div>
        <? require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <? require_once($rootPage."/panel/component/main/promo.php");?>
            <? require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <? require_once($rootPage."/panel/component/main/statistics.php");?>
            <? require_once($rootPage."/panel/component/main/solutions.php");?>
            <? require_once($rootPage."/panel/component/main/reviews.php");?>
            <? require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>