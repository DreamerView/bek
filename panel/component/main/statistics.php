<?
function statisticsBlock() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $Image = require($root."/panel/modules/image.php");
        $lang = require($root."/panel/modules/language.php");
        $statistics = json_decode(file_get_contents($root.'/panel/translate/components/statistics.json'),true);
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
<section class="statistics">
    <div class="titleSection">
        <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $statistics['title'][$lang]);?></h2>
        <div class="underline"></div>
    </div>
    <div class="statistics_row">
        <div class="statistics_block">
                <h3>700<strong>+</strong></h3>
                <span><?=$statistics['content1'][$lang];?></span>
            </div>
            <div class="statistics_block">
                    <h3>40<strong>%</strong></h3>
                    <span><?=$statistics['content2'][$lang];?></span>
                </div>
                <div class="statistics_block">
                    <h3>70<strong>%</strong></h3>
                    <span><?=$statistics['content3'][$lang];?></span>
                </div>
                <div class="statistics_block">
                    <h3>24<strong>/7</strong></h3>
                    <span><?=$statistics['content4'][$lang];?></span>
                </div>
            </div>
        </section>
<? } ob_flush();
}
statisticsBlock();
?>