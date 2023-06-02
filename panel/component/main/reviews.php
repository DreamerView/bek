<?
function reviewsModule() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $lang = require($root."/panel/modules/language.php");
        $reviews = json_decode(file_get_contents($root.'/panel/translate/components/reviews.json'),true);
        $Image = require($root."/panel/modules/image.php");
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
<section class="reviews">
            <div class="reviews_row">
                <div class="titleSection">
                    <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $reviews['title'][$lang]);?></h2>
                    <div class="underline"></div>
                </div>
            </div>
            <div class="reviews_row_list">
                <div><?=$Image('/images/reviews/minified/kazakhmys_optimized.webp','Kazakhmys');?></div>
                <div><?=$Image('/images/reviews/minified/Alpha-Safety_optimized.webp','Alpha-Safety');?></div>
                <div><?=$Image('/images/reviews/minified/novazink_optimized.webp','NovaZink');?></div>
                <div><?=$Image('/images/reviews/minified/siemens_optimized.webp','Siemens');?></div>
                <div><?=$Image('/images/reviews/minified/technoton_optimized.webp','Technoton');?></div>
                <div><?=$Image('/images/reviews/minified/VESA_optimized.webp','VESA');?></div>
            </div>
        </section>
<? } ob_flush();
    }
    reviewsModule();
?>
