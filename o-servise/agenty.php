<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Агенты");
?><?php
$APPLICATION->IncludeComponent(
	"mcart:agents.list", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"HLBLOCK_TNAME" => "b_hlbd_real_estate_agents",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"AGENTS_COUNT" => "1"
	),
	false
);

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>