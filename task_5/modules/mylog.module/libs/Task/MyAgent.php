<?php

namespace Mylog\Module\Task;

class MyAgent {

    public static function ClearOldLogs() {

		\Bitrix\Main\Loader::includeModule('iblock');
		global $DB;

        /*инфоблок c логами*/
		$IBLOCKLOG_ID = 2;
		
		$arFilter = Array('IBLOCK_ID'=>$IBLOCKLOG_ID);
		$element_list = \CIBlockElement::GetList(Array("TIMESTAMP_X"=>"DESC"), $arFilter);
		
		$arElementsId = [];
		
			while ($element = $element_list->Fetch())
			{
				$arElementsId [] = $element["ID"];
			} 
		
		array_splice($arElementsId, 0, 10);
		
		foreach ($arElementsId as $value) {
			$DB->StartTransaction();
			if(!\CIBlockElement::Delete($value))
			{
				$DB->Rollback();
			}
			else
				$DB->Commit();
		}

		return '\\' . __CLASS__ . '::' . __FUNCTION__ . '();';
    }
}
