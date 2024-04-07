<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
    <title><?=$APPLICATION->ShowTitle();?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?=$APPLICATION->ShowHead(); ?>
    <?php
        use Bitrix\Main\Page\Asset;

        Asset::getInstance()->addString('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH .'/fonts/icomoon/style.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/magnific-popup.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/jquery-ui.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.carousel.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/owl.theme.default.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/bootstrap-datepicker.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/mediaelementplayer.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/animate.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/fonts/flaticon/font/flaticon.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/fl-bigmug-line.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/aos.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
    ?>
</head>

<body>
  <?= $APPLICATION->ShowPanel(); ?>

  <div class="site-loader"></div>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "PATH" => "/local/include/header/phone.php",
                  "EDIT_TEMPLATE" => ""
                )
              );?>
              <?$APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => "/local/include/header/email.php",
                    "EDIT_TEMPLATE" => ""
                  )
              );?>
            </p>
          </div>
          <div class="col-6 col-md-6 text-right">
          <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => "/local/include/header/social_media_contacts.php",
                "EDIT_TEMPLATE" => ""
              )
            );?>
            </div>
        </div>
      </div>
    </div>

    <div class="site-navbar">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4">
            <h1 class="">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                      "AREA_FILE_SHOW" => "file",
                      "PATH" => "/local/include/header/title.php",
                      "EDIT_TEMPLATE" => ""
                    )
                );?>
                </h1>
          </div>
          <div class="col-4 col-md-4 col-lg-8">
             <!-- Код компонента меню -->
             <?$APPLICATION->IncludeComponent(
              "bitrix:menu", 
              "top_multi", 
              array(
                "ROOT_MENU_TYPE" => "top",
                "MAX_LEVEL" => "3",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "CACHE_SELECTED_ITEMS" => "N",
                "MENU_THEME" => "site",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "COMPONENT_TEMPLATE" => "top_multi",
                "CHILD_MENU_TYPE" => "left"
              ),
              false
            );?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
