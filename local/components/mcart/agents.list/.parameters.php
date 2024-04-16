<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/*
 * Нужно создать параметры, аналогичные параметрам компонента news.list
 * 1. Строка для Название таблицы (TABLE_NAME) Highload-блока.
 * 2. Количество элементов для постраничной пагинации
 * 3. Время кеширования (CACHE_TIME)
 */

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        // Пример параметра: Название таблицы Highload-блока
        "HLBLOCK_TNAME"  =>  Array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MCART_AGENTS_LIST_HLBLOCK_TNAME"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        // Пример параметра: количество элементов для постраничной пагинации
        "AGENTS_COUNT" =>  array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_CONT"),
            "TYPE" => "STRING",
            "DEFAULT" => "20",
        ),
        // Пример параметра: время кеширования
        "CACHE_TIME" => array(
            "DEFAULT" => 36000000,
        ),
    ),
);
