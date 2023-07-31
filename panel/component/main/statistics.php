<?
function statisticsBlock() {
    ob_start("ob_gzhandler");
    {
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        $Image = require($root."/panel/modules/image.php");
        $lang = require($root."/panel/modules/language.php");
        $statistics = json_decode(file_get_contents($root.'/panel/translate/components/statistics.json'),true);
        $stats1 = 700;
        $stats2 = 40;
        $stats3 = 70;
        $stats4 = 24;
    }
    ob_end_clean();
?>
<? ob_start(); { ?>
    <section class="statistics">
        <div class="statistics_row">
            <div class="statistics_block">
                <h3><span id="stats1"><?=$stats1;?></span><strong>+</strong></h3>
                <span><?=$statistics['content1'][$lang];?></span>
            </div>
            <div class="statistics_block">
                <h3><span id="stats2"><?=$stats2;?></span><strong>%</strong></h3>
                <span><?=$statistics['content2'][$lang];?></span>
            </div>
            <div class="statistics_block">
                <h3><span id="stats3"><?=$stats3;?></span><strong>%</strong></h3>
                <span><?=$statistics['content3'][$lang];?></span>
            </div>
            <div class="statistics_block">
                <h3><span id="stats4"><?=$stats4;?></span><strong>/7</strong></h3>
                <span><?=$statistics['content4'][$lang];?></span>
            </div>
        </div>
    </section>
    <script>
        function animateValue(id, start, end, duration) {
            if (start === end) return;
            var range = end - start;
            var current = start;
            var increment = end > start? 1 : -1;
            var stepTime = Math.abs(Math.floor(duration / range));
            var obj = document.getElementById(id);
            var timer = setInterval(function() {
                current += increment;
                obj.innerHTML = current;
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }
        window.addEventListener("DOMContentLoaded", function() {
            animateValue("stats1", 1, <?=$stats1;?>, 5000);
            animateValue("stats2", 1, <?=$stats2;?>, 5000);
            animateValue("stats3", 1, <?=$stats3;?>, 5000);
            animateValue("stats4", 1, <?=$stats4;?>, 5000);
        });
    </script>
        
<? } ob_flush();
}
statisticsBlock();
?>