<?
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
$info = json_decode(file_get_contents($root.'/panel/database/info.json'),true);
$langContent = (!isset($_GET['lang'])||!in_array($_GET['lang'],$info['languageSupport']))?$info['defaultLanguage']:$_GET['lang'];
return $langContent;
?>