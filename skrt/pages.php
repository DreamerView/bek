<?php
    ob_start("ob_gzhandler");
    $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]);
    $langPage = require_once($rootPage."/panel/modules/language.php");
    $skrtList = json_decode(file_get_contents($rootPage.'/panel/translate/pages/skrt-list.json'),true);
    $pages = [];
    $fcms;
    foreach($skrtList as $check) {
        array_push($pages,$check['key']);
        if($_GET['find']===$check['key']) $fcms=$check;
    }
    if(!in_array($_GET['find'],$pages)) header('Location: /');
    $showResult = json_decode(file_get_contents($rootPage.'/panel/translate/pages/scrt/'.$_GET['find'].'.json'),true);
    $result = $_GET['find'];
    $Image = require_once($rootPage."/panel/modules/image.php");
    $req = $_SERVER['REQUEST_URI'];
    $linkPage = require_once($rootPage."/panel/modules/link.php");
    $skrt = json_decode(file_get_contents($rootPage.'/panel/translate/pages/skrt.json'),true);
    ob_end_clean();
?>

    <?php require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($fcms['title'][$langPage],$skrt['content'][$langPage]);?>
    <body>
        <?php require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <div class="promoWelcome">
                <div class="promoWelcomeContent"><h1><?=$fcms['title'][$langPage];?></h1><p><?=$skrt['title'][$langPage];?></p></div>
                <div class="promoWelcomeBack"></div>
                <?=$Image("/images/skrt/minified/".$fcms['key'].".webp",$fcms['title'][$langPage]);?>
            </div>
            <nav class="navMenu">
                <ul>
                    <?php foreach($skrtList as $display): ?>
                        <li class="<?=(str_contains($req, $display['key']))?'activeNav':NULL?>"><?=$linkPage('/skrt-solutions/'.$display['key'],$display['title'][$langPage],$display['title'][$langPage],'','');?></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <?php 
                // if(in_array($result,$pages)) include_once($rootPage."/skrt/components/".$result.".php");
            ?>
        <? if(isset($showResult['title1'])) : ?>
        <section class="introduction">
            <? if(isset($showResult['title1'])) : ?>
            <div class="titleSection">
                <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $showResult['title1'][$langPage]);?></h2>
                <div class="underline"></div>
            </div>
            <? endif; ?>
            <? if(isset($showResult['content'])) : ?>
                <? foreach($showResult['content'] as $result): ?>
                    <p><?=$result['text'][$langPage];?></p>
                <? endforeach;?>
            <? endif; ?>
            <? if(isset($showResult['image'])) : ?>
            <?=$Image($showResult['image'],$fcms['title'][$langPage]);?>
            <? endif;?>
        </section>
        <? endif; ?>
        <? if(isset($showResult['solutions'])) : ?>
        <section class="introduction">
            <div class="titleSection">
                <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $skrt['problems'][$langPage]);?></h2>
                <div class="underline"></div>
            </div> 
            <div class="landingPromoContent">
                <? foreach($showResult['solutions'] as $solutions):?>
                <div><?=$Image($solutions['image'],"icons");?><p><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $solutions['content'][$langPage]);?></p></div>
                <? endforeach;?>
            </div>
        </section>
        <? endif;?>
        <? if(isset($showResult['details']) || isset($showResult['solveImg'])) : ?>
        <section class="spoiler">
        <div class="titleSection">
            <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $skrt['solutions'][$langPage]);?></h2>
            <div class="underline"></div>
        </div>
        <? if(isset($showResult['solveImg'])): ?>
            <?=$Image($showResult['solveImg'],$fcms['title'][$langPage]);?>
        <? endif; ?>
        <? if(isset($showResult['details'])): ?>
            <? foreach($showResult['details'] as $printS): ?>
                <details>
                    <summary><?=$printS['title'][$langPage];?></summary>
                    <div>
                        <? if(isset($printS['title1'])): ?>
                        <h3><?=$printS['title1'][$langPage];?></h3>
                        <? endif;?>
                        <? if(isset($printS['image'])): ?>
                        <?=$Image($printS['image'],$printS['title'][$langPage]);?>
                        <? endif;?>
                        <? if(isset($printS['list'])): ?>
                        <ul>
                            <? foreach($printS['list'] as $printL): ?>
                                <li><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $printL['text'][$langPage]);?></li>
                            <? endforeach;?>
                        </ul>
                        <?endif;?>
                    </div>
                </details>
                <? endforeach;?>
            <? endif;?>
        </section>
        <?endif;?>
            <?php require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <?php require_once($rootPage."/panel/component/main/statistics.php");?>
            <?php require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <?php require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>