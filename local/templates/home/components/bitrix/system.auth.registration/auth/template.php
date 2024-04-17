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

<?
if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE']))
{
	ShowMessage($arResult['ERROR_MESSAGE']);
}
?>


<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<div class="site-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-8 mb-5">
				<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" class ="p-5 bg-white border">
						<input type="hidden" name="AUTH_FORM" value="Y" />
						<input type="hidden" name="TYPE" value="REGISTRATION" />
					<?
						if (strlen($arResult["BACKURL"]) > 0)
						{
							?>
							<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
							<?
						}
					?>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for = "<?=$arResult["USER_LOGIN"]?>">
								<?=GetMessage("AUTH_LOGIN_MIN")?>:<span class="starrequired">*</span>
							</label>
							<input size="30" type="login" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" class ="form-control" />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for = "<?=$arResult["USER_LOGIN"]?>">
								<?=GetMessage("AUTH_EMAIL")?>:<span class="starrequired">*</span>
							</label>
							<input size="30" type="email" name="USER_EMAIL" value="<?=$arResult["USER_EMAIL"]?>" class ="form-control" />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for = "<?=$arResult["USER_LOGIN"]?>">
								<?=GetMessage("AUTH_PASSWORD_REQ")?>:<span class="starrequired">*</span>
							</label>
							<input size="30" type="password" name="USER_PASSWORD" value="<?=$arResult["USER_PASSWORD"]?>" autocomplete="off" class="form-control" />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for = "<?=$arResult["USER_LOGIN"]?>">
								<?=GetMessage("AUTH_CONFIRM")?>:<span class="starrequired">*</span>
							</label>
							<input size="30" type="password" name="USER_CONFIRM_PASSWORD" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" autocomplete="off" class="form-control" />
						</div>
					</div>
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
					<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
					<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
				</form>
			</div>
		</div>
	</div>
</div>


<?endif?>