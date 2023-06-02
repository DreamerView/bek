<?
function ContactModule() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $lang = require($root."/panel/modules/language.php");
        $Image = require($root."/panel/modules/image.php");
        $info = json_decode(file_get_contents($root.'/panel/database/info.json'),true);
        $link = require($root."/panel/modules/link.php");
        $contact = json_decode(file_get_contents($root.'/panel/translate/components/contactUs.json'),true);
    }
    ob_end_clean();
?>
<? ob_start(); 
{ ?>
<section class="contactUs">
    <div class="titleSection">
        <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $contact['title1'][$lang]);?></h2>
        <div class="underline"></div>
    </div>
    <div class="contactForm">
        <?=$Image("/images/icons/phone.svg","Телефон для связи");?>
        <?=$link('tel:'.$info['phoneShort'],$info['phone'],"Телефон для связи","","");?>
        <? foreach($contact['list'] as $row): ?>
        <p><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $row['content'][$lang]);?></p>
        <? endforeach; ?>
        <div class="with_i"><?=$Image("/images/icons/place.svg",$info['location'][$lang]);?><p><span class="bold">Адрес:</span><?=$link($info['locationURL'],$info['location'][$lang],'Адрес','','_blank');?></p></div>
        <div class="with_i"><?=$Image("/images/icons/email.svg",$info['email']);?><p><span class="bold">Почта:</span><?=$link('mailto:'.$info['email'],$info['email'],'Почта','','');?></p></div>
    </div>
</section>
<section class="spoiler">
    <div class="titleSection">
        <h2><?=preg_replace('/^[^\s]+/', '<b>$0</b>', $contact['title2'][$lang]);?></h2>
        <div class="underline"></div>
    </div>
    <? foreach($contact['details'] as $row): ?>
    <details>
        <summary><?=$row['title'][$lang];?></summary>
        <p><?=$row['content'][$lang];?></p>
    </details>
    <? endforeach; ?>
</section>
<? } ob_flush();

}

ContactModule();
?>