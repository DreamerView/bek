
<?
function FooterModule() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $Image = require($root."/panel/modules/image.php");
        $lang = require($root."/panel/modules/language.php");
        $getInfo = file_get_contents($root.'/panel/database/info.json'); 
        $info = json_decode($getInfo,true);
        $link = require($root."/panel/modules/link.php");
        $pages = ['bek','technoton','escort','pateoc'];
    }
    ob_end_clean();
?>
<script>
    const reveal = () => {
        const reveals = document.querySelectorAll("main > section:not(:first-child)");
      
        for (var i = 0; i < reveals.length; i++) {
          const windowHeight = window.innerHeight;
          const elementTop = reveals[i].getBoundingClientRect().top;
          const elementVisible = 150;
      
          if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("basic_animation");
            reveals[i].style.cssText = "opacity:1;";
          } else {
            reveals[i].classList.remove("basic_animation");
            reveals[i].style.cssText = "opacity:0;";
          }
        }
      };
    document.addEventListener("DOMContentLoaded", function() {
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/service-worker.js');
        }
        window.addEventListener("scroll", reveal);
    });
</script>
<footer>
        <div class="footer">
            <div class="footer_block">
                <?=$Image("/images/logo-header.webp","Logo BEKZ.KZ");?>
                <ul>
                    <li>
                        <div>
                            <?=$Image("/images/icons/phone.svg",'Позвонить на номер '.$info['phoneShort']);?>
                            <?=$link("tel:".$info['phoneShort'],$info['phone'],'Позвонить на номер '.$info['phoneShort'],'','');?>
                        </div>
                    </li>
                    <li>
                        <div>
                            <?=$Image("/images/icons/email.svg",'Написать на почту '.$info['email']);?>
                            <?=$link("mailto:".$info['email'],$info['email'],'Написать на почту '.$info['email'],'','');?>
                        </div>
                    </li>
                    <li>
                        <div>
                            <?=$Image("/images/icons/place.svg",$info['location'][$lang]);?>
                            <?=$link($info['locationURL'],$info['location'][$lang],'Узнать местоположение','','_blank');?>
                        </div>
                    </li>
                </ul>
            </div>
            <?foreach($pages as $row) :
                ob_start("ob_gzhandler");
                $getDocument = file_get_contents($root.'/panel/translate/documents/'.$row.'.json'); 
                $document = json_decode($getDocument,true);
                ob_end_clean();
            ?>
            <div class="footer_block">
                <h2><?=strtoupper($row);?></h2>
                <ul>
                <? foreach($document as $result):?>
                    <li>
                        <?=$link('/documents-list/'.$row,$result['title1'][$lang],$result['title1'][$lang],'','');?>
                    </li>
                <? endforeach; ?>
                </ul>
            </div>
            <? endforeach; ?>
        </div>
        <div class="footerContent">
            <span>&copy; <?=date("Y");?>, ТОО <b>"Business Engineering Kazakhstan"</b>. Все права защищены.</span>
        </div>
    </footer>
<? } FooterModule(); ?>