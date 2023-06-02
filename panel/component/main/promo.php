<?
function promoModule() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $Image = require($root."/panel/modules/image.php");
        $lang = require($root."/panel/modules/language.php"); 
        $text = json_decode(file_get_contents($root.'/panel/translate/components/promoModuleTranslate.json'),true);
        $action = json_decode(file_get_contents($root.'/panel/translate/action.json'),true);
        $link = require($root."/panel/modules/link.php");
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
<section class="promoImage">
        <? foreach($text as $row):?>
        <div class="promoImageRow basic_animation">
            <div class="promoImageContent">
                <h2 class="promoImageTitle"><?=$row['title'][$lang];?></h2>
                <p class="promoImageContent"><?=$row['content'][$lang];?></p>
                <?=$link($row['url'],$action['more'][$lang],$row['title'][$lang],'redButton btn-glow','');?>
            </div>
            <div class="promoImageBlock"></div>
            <?=$Image($row['image'],$row['title'][$lang]);?>
        </div>
        <? endforeach;?>
        <div class="promoNav">
            <? for($i=1;$i<=count($text);$i++):?>
            <div class="dot" onclick="currentSlide(<?=$i;?>)"></div>
            <? endfor;?>
        </div>
    </section>
<script>
    let slideIndex = 1;
    let timerInterval;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
        clearInterval(timerInterval);
        slideShow(5000);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
        clearInterval(timerInterval);
        slideShow(5000);
    }

    function slideShow(n) {
        timerInterval = setInterval(() => {
            if(slideIndex>=Number("<?=count($text);?>")) {
                slideIndex=1;
                showSlides(1);
            } else {
                showSlides(slideIndex++);
            }
        }, [Number(n)]);
    }

    slideShow(5000);

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("promoImageRow");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" activePromo", "");
        }
        slides[slideIndex-1].style.cssText = "display:flex;flex-direction:column;";  
        dots[slideIndex-1].className += " activePromo";
    }
</script>
<? } ob_flush();
 }
 promoModule();
?>