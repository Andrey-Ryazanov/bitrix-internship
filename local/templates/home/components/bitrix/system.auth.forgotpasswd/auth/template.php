<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

?>
<div class="site-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-8 mb-5">
            <?

            ShowMessage($arParams["~AUTH_RESULT"]);

            ?>

            <div>
                <p>Если вы забыли пароль, введите логин или E-Mail.</p>
                <p>Контрольная строка для смены пароля, а также ваши регистрационные данные, будут высланы вам по E-Mail.</p>
            </div>

            <form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class ="p-5 bg-white border">
                <?
                if (strlen($arResult["BACKURL"]) > 0)
                {
                    ?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                    <?
                }
                ?>
                <input type="hidden" name="AUTH_FORM" value="Y">
                <input type="hidden" name="TYPE" value="SEND_PWD">


                <div class="row form-group">
                    <div class="col-md-12">
                        <p>
                            <?=GetMessage("AUTH_LOGIN")?>
                        </p>

                        <input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class = "form-control" />
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <p>
                            <?=GetMessage("AUTH_EMAIL")?>
                        </p>
                        <input type="text" name="USER_EMAIL" maxlength="255" class = "form-control"/>
                    </div>
                </div>

				<div class="row form-group">
					<div class="col-md-12">
                        <input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" class="btn btn-primary py-2 px-4 rounded-0" />
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                document.bform.USER_LOGIN.focus();
            </script>
            </div>
        </div>
    </div>
</div>