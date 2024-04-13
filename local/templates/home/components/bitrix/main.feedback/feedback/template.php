<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>


<div class="col-md-12 col-lg-8 mb-5">
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="p-5 bg-white border">
		<?=bitrix_sessid_post()?>

		<?if(!empty($arResult["ERROR_MESSAGE"])):?>
		<?foreach($arResult["ERROR_MESSAGE"] as $v):?>
			<div class="mf-error-text"><?=$v?></div>
		<?endforeach;?>
		<?endif;?>

		<?if($arResult["OK_MESSAGE"] <> ''):?>
		<div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
		<?endif;?>

		<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold" for="fullname"><?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label>
				<input type="text" id="fullname" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" class="form-control">
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold" for="email"><?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label>
				<input type="text" id="email" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" class="form-control">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold" for="message"><?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label> 
				<textarea name="MESSAGE" id="message" cols="30" rows="5" class="form-control"><?=$arResult["MESSAGE"]?></textarea>
			</div>
		</div>

		<?if($arParams["USE_CAPTCHA"] == "Y"):?>
		<div class="row form-group">
			<div class="col-md-12">
				<div class="mf-captcha">
					<label class="font-weight-bold"><?=GetMessage("MFT_CAPTCHA")?></label>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
					<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="form-control">
				</div>
			</div>
		</div>
		<?endif;?>
		
		<div class="row form-group">
			<div class="col-md-12">
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
				<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>" class="btn btn-primary py-2 px-4 rounded-0">
			</div>
		</div>
	</form>
</div>

