<?php

use Bitrix\Main\Application;
use Bitrix\Main\Entity\Event;
use Bitrix\Main\EventManager;

class HighloadBlockEventHandler
{
    public static function registerHandlers()
    {
        $eventManager = EventManager::getInstance();

        // Добавляем обработчики для событий
        $eventManager->addEventHandler(
            '',
            'RealEstateAgentsOnAfterAdd',
            ['HighloadBlockEventHandler', 'onAfterHighloadblockAction']
        );
        
        $eventManager->addEventHandler(
            '',
            'RealEstateAgentsOnAfterUpdate',
            ['HighloadBlockEventHandler', 'onAfterHighloadblockAction']
        );
        
        $eventManager->addEventHandler(
            '',
            'RealEstateAgentsOnAfterDelete',
            ['HighloadBlockEventHandler', 'onAfterHighloadblockAction']
        );
    }

    // Обработчик для событий
    public static function onAfterHighloadblockAction(Event $event)
    {
        $tableName = $event->getParameter("object")->entity->getDBTableName();
        self::clearCacheByTag($tableName);
    } 

    // Метод для сброса кэша по тегу
    private static function clearCacheByTag($tagName)
    {
        $taggedCache = Application::getInstance()->getTaggedCache();
        $taggedCache->clearByTag('hlblock_table_name_' . $tagName);
    }
}

