
<?
if (file_exists(require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/clear_component_cache.php"))){
    // Автозагрузка классов
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/clear_component_cache.php");

    // Регистрация обработчиков событий
    HighloadBlockEventHandler::registerHandlers();
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/register_handler.php'))
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/register_handler.php');
