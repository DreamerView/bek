<?
function solutionsBlock() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $lang = require($root."/panel/modules/language.php");
        $Image = require($root."/panel/modules/image.php");
        $solutions = json_decode(file_get_contents($root.'/panel/translate/components/solutions.json'),true);
        $action = json_decode(file_get_contents($root.'/panel/translate/action.json'),true);
        $link = require($root."/panel/modules/link.php");
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
<section class="solutions">
            <div class="titleSection">
                <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $solutions['title'][$lang]);?></h2>
                <div class="underline"></div>
            </div>
            <div class="solutions_row">
                <? foreach($solutions['folder'] as $row): ?>
                    <div class="solutions_block">
                        <?=$Image($row['img'],$row['title'][$lang]);?>
                        <div>
                            <h3><?=$row['title'][$lang];?></h3>
                            <span><?=$row['content'][$lang];?></span>
                        </div>
                        <!-- <?=$link($row['url'],$action['more'][$lang],$row['title'][$lang],'buttonCustom '.$row['backColor'],'');?> -->
                    </div>
                <? endforeach; ?>
            </div>
        </section>
<? } ob_flush();
    }
    solutionsBlock();
?>