<? return function($href,$name,$title,$class,$target) {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $lang = require($root."/panel/modules/language.php");
        $target = ($target==='')?"_parent":$target;
        $follow = ($target==="_blank")?"noopener":"";
    }
    ob_end_clean();
    ?>
    <a lang="<?=$lang;?>" target="<?=$target;?>" href="<?=$href;?>?lang=<?=$lang;?>" class="<?=$class;?>" title="<?=$title;?>" rel="<?=$follow;?>"><?=$name;?></a>
<? }?>