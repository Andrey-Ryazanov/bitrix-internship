<?php

// Регистрируем обработчик событий
AddEventHandler("main", "OnAfterUserRegister", array("RegisterHandler", "OnAfterUserRegisterHandler"));

class RegisterHandler
{
    public static function OnAfterUserRegisterHandler(&$arFields)
    {
        // Проверяем, что пользователь успешно зарегистрирован
        if ($arFields["USER_ID"] > 0) {
            // Получаем значение поля типа "enumeration" по идентификатору
            $enumId = $arFields['UF_USER_TYPE']; 
            $value = static::getEnumUserFieldValueById($enumId);
            
            // Если значение найдено, добавляем пользователя в соответствующую группу
            if ($value !== false) {
                // Получаем ID группы по символьному идентификатору
                $groupId = static::getGroupIdByStringId($value);
                
                // Если удалось получить ID группы, добавляем пользователя в эту группу
                if ($groupId) {
                    $arGroups = CUser::GetUserGroup($arFields["USER_ID"]); 
                    $arGroups[] = $groupId;
                    CUser::SetUserGroup($arFields["USER_ID"], $arGroups); 
                }
            }
        }
    }

    public static function getEnumUserFieldValueById($enumId)
    {
        $arFieldRes = CUserFieldEnum::GetList([], ['ID' => $enumId]);
        if ($arField = $arFieldRes->Fetch()) {
            return $arField['XML_ID'];
        }
        return false;
    }

    protected static function getGroupIdByStringId($groupStringId)
    {
        $groupId = 0;

        // Запрос к базе данных для получения ID групп по символьному идентификатору
        $group = CGroup::GetList("c_sort", "asc", ["STRING_ID" => $groupStringId]);

        if ($groupItem = $group->Fetch()) {
            $groupId  = $groupItem["ID"];
        }

        return $groupId;
    }
}
