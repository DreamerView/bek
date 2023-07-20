<?
    ob_start("ob_gzhandler");
    {
        $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
        $Image = require_once($rootPage."/panel/modules/image.php");
        $langPage = require($rootPage."/panel/modules/language.php");
        $pageInfo = json_decode(file_get_contents($rootPage.'/panel/translate/pages/videoregistration.json'),true);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($pageInfo['title'][$langPage],$pageInfo['content'][$langPage]);?>

    <body>
        <? require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <section class="spoiler">
                <div class="titleSection">
                    <h1><?=preg_replace('/^[^\s]+/', '<mark><b>$0</b></mark>', $pageInfo['title1'][$langPage]);?></h1>
                    <p><?=$pageInfo['content1'][$langPage];?></p>
                    <div class="underline"></div>
                </div>
                <? foreach($pageInfo['details'] as $row): ?>
                <details>
                    <summary><?=$row['title'][$langPage];?></summary>
                    <div>
                        <?if(isset($row['content'])):?>
                            <? foreach($row['content'] as $display) : ?>
                                <? if(isset($display['image'])): ?>
                                    <?=$Image($display['image'],$row['title'][$langPage]);?>
                                <? endif; ?>
                                <? if(isset($display['text'])): ?>
                                    <p><?=$display['text'][$langPage];?></p>
                                <? endif; ?>
                                <? if(isset($display['ul'])): ?>
                                    <ul>
                                    <? foreach($display['ul'] as $list) : ?>
                                        <li><?=$list['list'][$langPage];?></li>
                                    <? endforeach;?>
                                    </ul>
                                <? endif; ?>
                            <? endforeach;?>
                        <? endif; ?>
                    </div>
                </details>
                <? endforeach; ?>
            </section>
            <? require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <? require_once($rootPage."/panel/component/main/statistics.php");?>
            <? require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>