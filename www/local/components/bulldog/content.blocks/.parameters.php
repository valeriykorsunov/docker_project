<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array();

$rsIBlock = CIBlock::GetList(Array("SORT" => "ASC"), Array("ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
{
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arSelect = Array("ID", "NAME");
$arResElem = CIBlockElement::GetList(
	Array("SORT" => "ASC"),
	Array(
		"IBLOCK_TYPE " => $arCurrentValues["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"],
	),
	false,
	array(),
	$arSelect
);
while($arr=$arResElem->Fetch())
{
	$arIBlockElem[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}


$arComponentParameters = array(
	"PARAMETERS"=> array(
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "ID инфобллока",
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
			"ADDITIONAL_VALUES" => "Y",
		),
		"ID_ELEM" => array(
			"PARENT" => "BASE",
			"NAME" => "Элемент инфобллока",
			"TYPE" => "LIST",
			"VALUES" => $arIBlockElem,
			"ADDITIONAL_VALUES" => "Y",
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>3000),
	)

);