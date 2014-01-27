<?
require_once( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php' );

function adminer_object() {
	include_once $_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/uniplug.sqladminer/vendor/plugins/plugin.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/uniplug.sqladminer/vendor/plugins/bitrix.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/uniplug.sqladminer/vendor/plugins/dump-zip.php";
	include( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/dbconn.php' );

	global $APPLICATION;

	$plugins = array(
		new AdminerDumpZip(),
		new AdminerBitrix($DBHost, $DBLogin, $DBName, $DBPassword, $APPLICATION->GetCurDir()),
		);

	return new AdminerPlugin($plugins);
}

include $_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/uniplug.sqladminer/vendor/adminer-4.0.2-mysql.php";
?>
