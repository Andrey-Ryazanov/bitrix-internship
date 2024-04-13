<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?>

<div class="site-section">
	<div class="container">
		<div class="row">
			 <?$APPLICATION->IncludeComponent(
				"bitrix:main.feedback",
				"feedback",
				Array(
					"EMAIL_TO" => "andrey58645@mail.ru",
					"EVENT_MESSAGE_ID" => "",
					"OK_TEXT" => "Спасибо, ваше сообщение принято.",
					"REQUIRED_FIELDS" => array(0=>"NAME",1=>"EMAIL",2=>"MESSAGE",),
					"USE_CAPTCHA" => "Y"
				)
			);?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"EDIT_TEMPLATE" => "",
					"PATH" => "/local/include/kontakty_obratnaya_svyaz.php",
				)
			);?>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
