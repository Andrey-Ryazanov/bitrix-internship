<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"auth",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"FORGOT_PASSWORD_URL" => "/auth/forget_password.php",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "/auth/registation.php",
		"SHOW_ERRORS" => "N"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>