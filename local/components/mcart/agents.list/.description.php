<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*
 *  Задать имя компонента и Описание
 *  Разместить его в своем разделе в Визуальном редакторе
 */
 
 $arComponentDescription = array(
     "NAME" => GetMessage("T_IBLOCK_DESC_LIST"),
     "DESCRIPTION" => GetMessage("T_IBLOCK_DESC_LIST_DESC"),
     "ICON" => "/images/news_list.gif",
     "SORT" => 20,
     "CACHE_PATH" => "Y",
     "PATH" => array(
        "ID" => "mcart", // Раздел, где находится компонент
        "NAME" => "MCart", // Название раздела
        "CHILD" => array(
            "ID" => "agents", // Подраздел, где находится компонент
            "NAME" => "Agents", // Название подраздела
            "SORT" => 10,
        ),
    ),
    
 );
 
 ?>
