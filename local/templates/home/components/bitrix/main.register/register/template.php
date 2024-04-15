<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>

<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8 mb-5 mt-5">
			<?
				if (!empty($arResult["ERRORS"])):
					foreach ($arResult["ERRORS"] as $key => $error)
						if (intval($key) == 0 && $key !== 0) 
							$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

					ShowError(implode("<br />", $arResult["ERRORS"]));

				elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
			?>
			<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
			<?endif?>
			<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
				<?
				if($arResult["BACKURL"] <> ''):
				?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?
				endif;
				?>
				<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for = "<?=$FIELD?>">
								<?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?>
							</label>
							<?switch ($FIELD)
							{
								case "LOGIN":
									?>
									<input size="30" type="login" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" class ="form-control" /><?	
									break;				
								case "PASSWORD":
									?>
									<input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="form-control" />

								<?
									break;
								case "CONFIRM_PASSWORD":
									?><input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="form-control"/><?
									break;
								
								case "EMAIL":
									?>
									<input size="30" type="email" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" class ="form-control" /><?
								}?>
						</div>
					</div>
				<?endforeach?>
				<?// ********************* User properties ***************************************************?>
				<?php
				if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):
					foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="font-weight-bold" for="<?=$FIELD_NAME?>">
									<?=$arUserField["EDIT_FORM_LABEL"]?>:<?php if ($arUserField["MANDATORY"] == "Y"): ?><span class="starrequired">*</span><?php endif; ?>
								</label>
								<br>
								<?php $APPLICATION->IncludeComponent(
									"bitrix:system.field.edit",
									$arUserField["USER_TYPE"]["USER_TYPE_ID"],
									array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"),
									null,
									array("HIDE_ICONS" => "Y")
								); ?>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

				<?// ******************** /User properties ***************************************************?>
				<?
				/* CAPTCHA */
				if ($arResult["USE_CAPTCHA"] == "Y")
				{
					?>
					<div class="row form-group">
						<div class="col-md-12">
						<b><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></b><br>
							<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
							<p><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span></p>
							<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" class="form-control" />
						</div>
					</div>
					<?
				}
				/* !CAPTCHA */
				?>

				<div class="row form-group">
					<div class="col-md-12">
						<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
						<input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" class="btn btn-primary py-2 px-4 rounded-0">
					</div>
				</div>
			</form>

			<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>

			<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
		</div>
	</div>
</div>

<?endif?>