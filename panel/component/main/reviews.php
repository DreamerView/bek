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
                    <p><?=$reviews['content'][$lang];?></p>
                    <div class="underline"></div>
                </div>
            </div>
            <div class="slider-responsive">
            <div class="slider-container">
                <a href="/images/reviews/kazakhmys.jpg" title="Kazakhmys" class="slide slide-1">
                    <?=$Image('/images/reviews/minified/kazakhmys_optimized.webp','Kazakhmys');?>
                </a>
                <a href="/images/reviews/Alpha-Safety.jpg" title="Alpha-Safety" class="slide slide-2">
                    <?=$Image('/images/reviews/minified/Alpha-Safety_optimized.webp','Alpha-Safety');?>
                </a>
                <a href="/images/reviews/novazink.jpg" title="NovaZink" class="slide slide-3">
                    <?=$Image('/images/reviews/minified/novazink_optimized.webp','NovaZink');?>
                </a>
                <a href="/images/reviews/siemens.jpg" title="Siemens" class="slide slide-4">
                    <?=$Image('/images/reviews/minified/siemens_optimized.webp','Siemens');?>
                </a>
                <a href="/images/reviews/technoton.jpg" title="Technoton" class="slide slide-5">
                    <?=$Image('/images/reviews/minified/technoton_optimized.webp','Technoton');?>
                </a>
                <a href="/images/reviews/VESA.jpg" title="VESA" class="slide slide-6">
                    <?=$Image('/images/reviews/minified/VESA_optimized.webp','VESA');?>
                </a>
                <div class="buttons-container">
                    <button class="arrow left">
                    <
                    </button>
                    <button class="arrow right">
                    >
                    </button>
                </div>
                </div>
            </div>
        </section>
        <script>
            const leftButton = document.querySelector('.arrow.left');
const rightButton = document.querySelector('.arrow.right');

leftButton.addEventListener('click', () => {
  turnSlider('left');
});

rightButton.addEventListener('click', () => {
  turnSlider('right');
});

function turnSlider(direction) {
  const slides = document.querySelectorAll(`.slide`);
  slides.forEach(slide => {
    let currentSlide = +(slide.classList + '').split('-')[1];
    let slideToBe;
    switch(direction) {
      case 'left': {
        slideToBe = currentSlide - 1;
        if(slideToBe < 1) {
          slideToBe = slides.length;
          slide.style.left = '-500px';
        }
        break;
      }
      case 'right': {
        slideToBe = currentSlide + 1;
        if(slideToBe > slides.length) {
          slideToBe = 1;
          slide.style.left = '2000px';
        }
        break;
      }
    }
    slide.classList.remove(`slide-${currentSlide}`);
    slide.classList.add(`slide-${slideToBe}`);
  });
}
        </script>
<? } ob_flush();
    }
    reviewsModule();
?>
