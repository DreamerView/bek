<?
function HeaderModule() {
    ob_start("ob_gzhandler");
    {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]); 
    $Image = require($root."/panel/modules/image.php");
    $lang = require($root."/panel/modules/language.php");
    $info = json_decode(file_get_contents($root.'/panel/database/info.json'),true);
    $headerTranslate = json_decode(file_get_contents($root.'/panel/translate/action.json'),true);
    }
    ob_end_clean();
?>
<div class="full">
    <div class="basic_animation">
        <div>
            <h1><?=$headerTranslate["languageTitle"][$lang];?></h1>
            <p><?=$headerTranslate["languageContent"][$lang];?></p>
        </div>
        <ul>
            <li>
                <a href="?lang=kk">Қазақша</a>    
            </li>
            <li>
                <a href="?lang=ru">Русский</a>
            </li>
            <li>
                <a href="?lang=en">English</a>
            </li>
        </ul>
    </div>
</div>
<header>
    <div class="header__block">
        <div class="header__first_block">
            <?=$Image("/images/logo-header.webp","Logo BEKZ");?>
            <input placeholder="<?=$headerTranslate['search'][$lang];?>" type="search" name="" id="">
        </div>
        <div class="header__second_block">
            <div>
                <?=$Image("/images/icons/phone.svg","Позвонить на номер ".$info['phoneShort']);?>
                <a title="Позвонить на номер <?=$info['phoneShort'];?>" href="tel:<?=$info['phoneShort'];?>"><?=$info['phone'];?></a>
            </div>
            <div>
                <?=$Image("/images/icons/translate.svg","Выберите язык");?>
                <a title="Выберите язык" href="" onClick="changeLanguage();return false;"><?=$headerTranslate["selectLanguage"][$lang];?></a>
            </div>
        </div>
    </div>
</header>
<? require_once($root."/panel/component/aboutusblock.php");?>
<? require_once($root."/panel/component/navMenu.php");?>
<script>
    function changeLanguage() {
        document.querySelector("div.full").style.display = 'flex';
    }
</script>
<? }
    HeaderModule();
?>