<?
    ob_start("ob_gzhandler");
    {
        $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO("Контакты","");?>
    
    <body>
        <?
            // Start Header
            require_once($rootPage."/panel/component/header.php");
            // End Header
        ?>
    <main class="block_animation">
        <? require_once($rootPage."/panel/component/main/contactUs.php");?>
    </main>
    <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>