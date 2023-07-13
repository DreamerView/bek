<?
    ob_start("ob_gzhandler");
    {
        $rootPage = realpath($_SERVER["DOCUMENT_ROOT"]); 
        $pages = ['technoton','escort','pateoc','vesa','galileosky','bek'];
        $show = array('technoton'=>'TECHNOTON','escort'=>'ESCORT','pateoc'=>'PATEOC','vesa'=>'VESA','galileosky'=>'Galileosky','bek'=>'BEK');
        $langPage = require_once($rootPage."/panel/modules/language.php");
        if(!in_array($_GET['find'],$pages)) header('Location: /');
        $result = $_GET['find'];
        $Image = require_once($rootPage."/panel/modules/image.php");
        $req = $_SERVER['REQUEST_URI'];
        $linkPage = require_once($rootPage."/panel/modules/link.php");
        $actionPage = json_decode(file_get_contents($rootPage.'/panel/translate/action.json'),true);
    }
    ob_end_clean();
?>

    <? require_once($rootPage."/panel/modules/seo.php");?>
    <?=$SEO($show[$result],"");?>

    <body>
        <? require_once($rootPage."/panel/component/header.php");?>
        <main class="block_animation">
            <div class="promoWelcome">
                <div class="promoWelcomeContent"><h1><?=$show[$result];?></h1><p><?=$actionPage['equipment'][$langPage];?></p></div>
                <div class="promoWelcomeBack"></div>
                <?=$Image("/images/equipment/list/".$result.".webp",$show[$result]);?>
            </div>
            <nav class="navMenu">
                <ul>
                    <? foreach($pages as $display): ?>
                        <li class="<?=(str_contains($req, $display))?'activeNav':NULL?>"><?=$linkPage('/documents-list/'.$display,$show[$display],$show[$display],'','');?></li>
                    <? endforeach; ?>
                </ul>
            </nav>
            <section class="landingContent">
            <?
            ob_start("ob_gzhandler");
            {
                $documents = json_decode(file_get_contents($rootPage.'/panel/translate/documents/'.$result.'.json'),true);
            }
            ob_end_clean();
            foreach($documents as $row) : ?>
                <div class="animations" id="<?=$row['key'];?>">
                    <div class="landingRightContentImage">
                        <?=$Image($row['img'],$row['title1'][$langPage]." - ".$row['title2'][$langPage]);?>
                    </div>
                    <div class="landingRightContentText">
                        <h2><b><?=$row['title1'][$langPage];?></b><?if($row['title2'][$langPage]!==""):?> - <?=$row['title2'][$langPage];?><?endif;?></h2>
                        <p><?=$row['content'][$langPage];?></p>
                        <?=$linkPage($row['url'],$actionPage['more'][$langPage],$row['title1'][$langPage]." - ".$row['title2'][$langPage],'redButton btn-glow',$row['urlType']);?>
                    </div>
                </div>
            <? endforeach; ?>
            </section>
            <script>
                const animationBlocks = () => {
                    const reveals = document.querySelectorAll("section.landingContent > div.animations");
                
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
                document.addEventListener("DOMContentLoaded", function(){
                    window.addEventListener("scroll", animationBlocks);
                });
            </script>
           
            <? require_once($rootPage."/panel/component/main/landingWelcome.php");?>
            <? require_once($rootPage."/panel/component/main/statistics.php");?>
            <? require_once($rootPage."/panel/component/main/contactUs.php");?>
        </main>
        <? require_once($rootPage."/panel/component/footer.php");?>
    </body>
</html>