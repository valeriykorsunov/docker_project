<?

/**
 * Скрипт выводит ключи для продления триальной лицензии
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
/** @var \CMain $APPLICATION */
/** @var \CUser $USER */
/** @var \CDatabase $DB */

echo '<p>';
echo TEMPORARY_CACHE;
echo "<br>";
global $DB;
$q = $DB->Query('SELECT * FROM b_option WHERE NAME="admin_passwordh"');
echo $q->Fetch()["VALUE"];
echo "</p>";