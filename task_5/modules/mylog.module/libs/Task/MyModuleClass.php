<?php

namespace Mylog\Module\Task;

class MyModuleClass {

    public static function AddLog(&$arFields) {

		global $USER;

        /*инфоблок c логами*/
		$IBLOCKLOG_ID = 2;

		$iBlockId = $arFields['IBLOCK_ID'];
		if ($iBlockId == $IBLOCKLOG_ID) {
			return;
		}

		function getSectionsNameRecursiveFind ($element, &$arName) {
			if ($element['IBLOCK_SECTION_ID']) {
				$res = \CIBlockSection::GetByID($element['IBLOCK_SECTION_ID']);
				$ar_res = $res->GetNext();
				$arName[] = $ar_res['NAME'];
				getSectionsNameRecursiveFind ($ar_res, $arName);
			}
			else {
				return;
			}
		}

        /*GetByID - Возвращает информационный блок по его ID.*/
		$iBlock = \CIBlock::GetByID($iBlockId);
		$ar_iBlock = $iBlock->GetNext();
		$nameSectionLog = $ar_iBlock['NAME']."(".$ar_iBlock['CODE'].")";

        /*проверяем наличие раздела, если отсутствует - создаем новый*/
		$arFilter = Array('IBLOCK_ID'=>$IBLOCKLOG_ID, 'CODE' => $ar_iBlock['CODE']);
		$section = \CIBlockSection::GetList("", $arFilter);
		if ($sectionLog = $section->GetNext())
		{
			$SECTION_ID = $sectionLog["ID"];
		} else {
			$bs = new \CIBlockSection;
			$arFieldsSection = Array(
			  "IBLOCK_SECTION_ID" => false,
			  "IBLOCK_ID" => $IBLOCKLOG_ID,
			  "NAME" => $nameSectionLog,
			  "CODE" => $ar_iBlock['CODE'],
			  );
		  	$SECTION_ID = $bs->Add($arFieldsSection);
		}

		$activeFromLog = new \Bitrix\Main\Type\Date;

		$element = \CIBlockElement::GetByID($arFields['ID']);
		$ar_element = $element->GetNext();

		$arName = [];
		$arName[] = $ar_element['NAME'];
		getSectionsNameRecursiveFind ($ar_element, $arName);
		$arName[] = $ar_element['IBLOCK_NAME'];

		$arName = array_reverse($arName);

        /*формируем строку вида: имя ИБ-> имя раздела -> ... -> имя элемента*/
		$previewText = implode("->", $arName);

		$el = new \CIBlockElement;
		$arLoadProductArray = [
            'MODIFIED_BY' => $USER->GetID(),
            'IBLOCK_SECTION_ID' => $SECTION_ID,
            'IBLOCK_ID' => $IBLOCKLOG_ID,
            'NAME' => $arFields['ID'],
			'ACTIVE_FROM' => $activeFromLog,
        	'PREVIEW_TEXT'=> $previewText,
        ];

		$arFilter = Array('IBLOCK_ID'=>$IBLOCKLOG_ID, 'NAME' => $arFields['ID']);
		$elementInLogAr = \CIBlockElement::GetList("", $arFilter);
		if ($elementInLog = $elementInLogAr->GetNext()) {

            /* Если элемент с именем "$arFields['ID']" найден в инфоблоке с логами "$IBLOCKLOG_ID"
             * то обновляем его в инфоблоке с логами */
			$ELEMENT_ID = $elementInLog["ID"];
			$el->Update($ELEMENT_ID, $arLoadProductArray);
		} else {

            /*Иначе добавляем новый элемент в инфоблок с логами*/
			$el->Add($arLoadProductArray); 
		}

    }
}
