<?
function navHeaderModule() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $req = $_SERVER['REQUEST_URI'];
        $lang = require($root."/panel/modules/language.php");
        $link = require($root."/panel/modules/link.php");
        $navHeader = json_decode(file_get_contents($root.'/panel/translate/header/headerNav.json'),true);
        $urlResult = (str_contains($req,'?lang='))?str_replace("?lang=".$lang, "",$req):$req;
    }
    ob_end_clean();
?>
<nav class="one">
    <ul class="topmenu">
        <? foreach($navHeader as $row) :?>
            <li class="<?=($urlResult===$row['url'])?'activeNav':NULL?>">
                <?=$link($row['url'],$row['title'][$lang],$row['title'][$lang],'','');?>
                <? if(isset($row['submenu'])): ?>
                <ul class="submenu">
                    <? foreach($row['submenu'] as $event) :?>
                        <li>
                            <?=$link($event['url'],$event['title'][$lang],$event['title'][$lang],'','');?>
                        </li>
                    <? endforeach;?>
                </ul>
            <? endif; ?>
            </li>
        <? endforeach; ?>
    </ul>
</nav>
<? } navHeaderModule(); ?>