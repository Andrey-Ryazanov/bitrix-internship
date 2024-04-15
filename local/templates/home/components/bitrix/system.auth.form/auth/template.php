<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<?
if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE']))
{
	ShowMessage($arResult['ERROR_MESSAGE']);
}
?>

<?if($arResult["FORM_TYPE"] == "login"):?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8 mb-5 mt-5">
            <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
                <?=bitrix_sessid_post()?>

                <?if($arResult["BACKURL"] <> ''):?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?endif?>
                
                <?foreach ($arResult["POST"] as $key => $value):?>
                    <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?endforeach?>
                    <input type="hidden" name="AUTH_FORM" value="Y" />
                    <input type="hidden" name="TYPE" value="AUTH" />

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="login"><?=GetMessage("AUTH_LOGIN")?><span class="mf-req">*</span></label>
                            <input type="text" id="login" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" class="form-control">
                        </div>
                    </div>
                    <script>
                        BX.ready(function() {
                            var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                            if (loginCookie)
                            {
                                var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                var loginInput = form.elements["USER_LOGIN"];
                                loginInput.value = loginCookie;
                            }
                        });
                    </script>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="password"><?=GetMessage("AUTH_PASSWORD")?><span class="mf-req">*</span></label>
                            <input type="password" id="password" name="USER_PASSWORD" value="" class="form-control">
                        </div>
                    </div>

                    <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                                <label for="USER_REMEMBER_frm"><?=GetMessage("AUTH_REMEMBER_ME")?></label>
                            </div>
                        </div>
                    <?endif?>

                    <?if($arResult["CAPTCHA_CODE"]):?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="mf-captcha">
                                <label class="font-weight-bold"><?=GetMessage("AUTH_CAPTCHA")?></label>
                                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA">
                                <div class="mf-text"><?=GetMessage("AUTH_CAPTCHA_PROMT")?><span class="mf-req">*</span></div>
                                <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <?endif?>
                    
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                            <input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" class="btn btn-primary py-2 px-4 rounded-0">
                        </div>
                    </div>

                <?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
                    <noindex><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></noindex><br />
                <?endif?>
                    <noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>
            </form>
        </div>
    </div>
</div>


<?
else:
?>

<form action="<?=$arResult["AUTH_URL"]?>">
	<table width="95%">
		<tr>
			<td align="center">
				<?=$arResult["USER_NAME"]?><br />
				[<?=$arResult["USER_LOGIN"]?>]<br />
				<a href="<?=$arResult["PROFILE_URL"]?>" title="<?=GetMessage("AUTH_PROFILE")?>"><?=GetMessage("AUTH_PROFILE")?></a><br />
			</td>
		</tr>
		<tr>
			<td align="center">
			<?foreach ($arResult["GET"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<?=bitrix_sessid_post()?>
			<input type="hidden" name="logout" value="yes" />
			<input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" />
			</td>
		</tr>
	</table>
</form>
<?endif?>