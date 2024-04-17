<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8 mb-5">
            <?
                ShowMessage($arParams["~AUTH_RESULT"]);
                ShowMessage($arResult['ERROR_MESSAGE']);
            ?>
            <form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

                <input type="hidden" name="AUTH_FORM" value="Y" />
                <input type="hidden" name="TYPE" value="AUTH" />
                <?if (strlen($arResult["BACKURL"]) > 0):?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?endif?>
                <?foreach ($arResult["POST"] as $key => $value):?>
                    <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?endforeach?>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="login"><?=GetMessage("AUTH_LOGIN")?><span class="mf-req">*</span></label>
                            <input type="text" id="login" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="password"><?=GetMessage("AUTH_PASSWORD")?><span class="mf-req">*</span></label>
                            <input type="password" id="password" name="USER_PASSWORD" value="" class="form-control">
                        </div>
                    </div>
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
                    <?endif;?>
                    <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y">
                                <label for="USER_REMEMBER_frm"><?=GetMessage("AUTH_REMEMBER_ME")?></label>
                            </div>
                        </div>
                    <?endif?>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                            <input type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>" class="btn btn-primary py-2 px-4 rounded-0"/>
                        </div>
                    </div>
                    <?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>
                        <noindex>
                            <p>
                                <a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
                            </p>
                        </noindex>
                    <?endif?> 
                    <?if($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y" && $arParams["AUTHORIZE_REGISTRATION"] != "Y"):?>
                        <noindex>
                            <p>
                                <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a><br />
                                <?//=GetMessage("AUTH_FIRST_ONE")?>
                            </p>
                        </noindex>
                    <?endif?>
                </form>
            </div>
            <script type="text/javascript">
                <?if (strlen($arResult["LAST_LOGIN"])>0):?>
                try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
                <?else:?>
                try{document.form_auth.USER_LOGIN.focus();}catch(e){}
                <?endif?>
            </script>
        </div>
    </div>
</div>
