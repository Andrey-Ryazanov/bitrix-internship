<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
   <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/local/include/footer/about.php",
                                "EDIT_TEMPLATE" => ""
                            )
                        );?>
                    </div>
                </div>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "footer_menu", Array(
                    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                        "MAX_LEVEL" => "1",	// Уровень вложенности меню
                        "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                        "CACHE_SELECTED_ITEMS" => "N",
                        "MENU_THEME" => "site",
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    ),
                    false
                );?>

            
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/local/include/footer/social_media_contacts.php",
                            "EDIT_TEMPLATE" => ""
                        )
                    );?>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/local/include/footer/copyright.php",
                        "EDIT_TEMPLATE" => ""
                    )
                );?>
                </div>
            </div>
        </div>
    </footer>
</div>

    <?php
        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-migrate-3.0.1.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery-ui.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/popper.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/mediaelement-and-player.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.stellar.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.countdown.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap-datepicker.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/aos.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
    ?>


</body>

</html>