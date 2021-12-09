<?php

use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

class MyReadFilter implements IReadFilter {

    public function readCell($columnAddress, $row, $worksheetName = '') {
        if ($row >= 1 && $row <= 8) {
            return true;
        }
        return false;
    }
}

if (!$USER->IsAdmin()) {
    LocalRedirect('/');
}
\Bitrix\Main\Loader::includeModule('iblock');

$row = 1;
$IBLOCK_ID = 12;

$el = new CIBlockElement;
$arProps = [];

$rsElement = CIBlockElement::getList([], ['IBLOCK_ID' => 12],
    false, false, ['ID', 'NAME']);

while ($ob = $rsElement->GetNextElement()) {
    $arFields = $ob->GetFields();
    $key = str_replace(['»', '«', '(', ')'], '', $arFields['NAME']);
    $key = strtolower($key);
    $arKey = explode(' ', $key);
    $key = '';
    foreach ($arKey as $part) {
        if (strlen($part) > 2) {
            $key .= trim($part) . ' ';
        }
    }
    $key = trim($key);

    $arProps['OFFICE'][$key] = $arFields['ID'];
}

$rsProp = CIBlockPropertyEnum::GetList(
    ["SORT" => "ASC", "VALUE" => "ASC"],
    ['IBLOCK_ID' => $IBLOCK_ID]
);
while ($arProp = $rsProp->Fetch()) {
    $key = trim($arProp['VALUE']);

    $arProps[$arProp['PROPERTY_CODE']][$key] = $arProp['ID'];
}

$rsElements = CIBlockElement::GetList([], ['IBLOCK_ID' => $IBLOCK_ID], false, false, ['ID']);
while ($element = $rsElements->GetNext()) {
    CIBlockElement::Delete($element['ID']);
}

$inputFileName = './announcement.xlsx';

$oReader = new Xlsx();
$oReader->setReadFilter(new MyReadFilter());

$oSpreadsheet = $oReader->load($inputFileName);

$oCells = $oSpreadsheet->getActiveSheet()->getCellCollection();

for ($iRow = 2; $iRow <= $oCells->getHighestRow(); $iRow++) {
    $value = 0;
    for ($iCol = 'B'; $iCol <= $oCells->getHighestColumn(); $iCol++) {
        $oCell = $oCells->get($iCol.$iRow);
        if($oCell) {
            $data[$value] = $oCell->getValue();
        }
        $value++;
    }
        $PROP['NAME'] = $data[0];
        $PROP['FLOOR'] = $data[1];
        $PROP['NUMBER_ROOMS'] = $data[2];
        $PROP['TOTAL_AREA'] = $data[3];
        $PROP['BATHROOM'] = $data[4];
        $PROP['LOCATION'] = $data[5];
        $PROP['PRICE'] = $data[6];
        $PROP['DATE'] = date('d.m.Y');
        $PROP['ACTIVE'] = $data[7];

    foreach ($PROP as $key => &$value) {
        $value = trim($value);

        //Установка ID для свойств типа "Список"
        if ($arProps[$key]) {
            foreach ($arProps[$key] as $propKey => $propVal) {
                if (stripos($propKey, $value) !== false) {
                    $value = $propVal;
                    break;
                }
            }
        }

        if ($key == "LOCATION") {
            $locationVal = str_replace([' ,', ', ', ' , '], ',', $value);
            $locationVal = explode(',', $locationVal);
            $value = $locationVal;
        }

    }

    $PROP['ACTIVE'] = mb_strtolower($PROP['ACTIVE'], "UTF-8");

    $arLoadProductArray = [
        "MODIFIED_BY" => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID" => $IBLOCK_ID,
        "PROPERTY_VALUES" => $PROP,
        "NAME" => $PROP['NAME'],
        "ACTIVE" => $PROP['ACTIVE'] == "да" ? 'Y' : 'N',
    ];

    if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
        echo "Добавлен элемент с ID : " . $PRODUCT_ID . "<br>";
    } else {
        echo "Error: " . $el->LAST_ERROR . '<br>';
    }
}