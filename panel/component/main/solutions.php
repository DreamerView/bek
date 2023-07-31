<?
function solutionsBlock() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $langPage = require($root."/panel/modules/language.php");
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
                <h2><?=preg_replace('/^[^\s]+/', '<mark><b>$0</b></mark>', $solutions['title'][$langPage]);?></h2>
                <p><?=$solutions['content'][$langPage];?></p>
                <div class="underline"></div>
            </div>
            <div class="solutions_row">
                <? foreach($solutions['folder'] as $row): ?>
                    <div class="solutions_block">
                        <?=$Image($row['img'],$row['title'][$langPage].". Icon by https://icons8.com Icons8");?>
                        <div>
                            <h3><?=$row['title'][$langPage];?></h3>
                            <span><?=$row['content'][$langPage];?></span>
                        </div>
                        <!-- <?=$link($row['url'],$action['more'][$langPage],$row['title'][$langPage],'buttonCustom '.$row['backColor'],'');?> -->
                    </div>
                <? endforeach; ?>
            </div>
        </section>
<? } ob_flush();
    }
    solutionsBlock();
?>