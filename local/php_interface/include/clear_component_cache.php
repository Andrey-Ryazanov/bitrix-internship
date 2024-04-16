<?php

use Bitrix\Main\Application;
use Bitrix\Main\EventManager;
use Bitrix\Main\Entity\Event;

class HighloadBlockEventHandler
{
    public static function registerHandlers()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->addEventHandler(
            'highloadblock',
            'OnAfterAdd',
            array(__CLASS__, 'onAfterHighloadblockAdd')
        );
        $eventManager->addEventHandler(
            'highloadblock',
            'OnAfterUpdate',
            array(__CLASS__, 'onAfterHighloadblockUpdate')
        );
        $eventManager->addEventHandler(
            'highloadblock',
            'OnAfterDelete',
            array(__CLASS__, 'onAfterHighloadblockDelete')
        );
    }

    public static function onAfterHighloadblockAdd(Event $event)
    {
        $tableName = $event->getParameter("ENTITY")->getTableName();
        self::clearCacheByTag($tableName);
    }

    public static function onAfterHighloadblockUpdate(Event $event)
    {
        $tableName = $event->getParameter("ENTITY")->getTableName();
        self::clearCacheByTag($tableName);
    }

    public static function onAfterHighloadblockDelete(Event $event)
    {
        $tableName = $event->getParameter("ENTITY")->getTableName();
        self::clearCacheByTag($tableName);
    }

    private static function clearCacheByTag($tagName)
    {
        $taggedCache = Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tagName);
    }
}
