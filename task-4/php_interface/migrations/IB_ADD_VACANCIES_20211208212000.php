<?php

namespace Sprint\Migration;


class IB_ADD_VACANCIES_20211208212000 extends Version
{

    protected $description = "Добавляет миграцию для иб Объявления";

    public function up() {

        $helper = new HelperManager();

        $arIBlockType = array(
            'ID' => 'CONTENT_RU',
            'SECTIONS' => 'Y',
            'IN_RSS' => 'N',
            'SORT' => 100,
            'LANG' => array(
                'ru' => array(
                    'NAME' => 'Каталог',
                    'SECTION_NAME' => 'Разделы',
                    'ELEMENT_NAME' => 'Элементы'
                ),
                'en' => array(
                    'NAME' => 'Catalog',
                    'SECTION_NAME' => 'Sections',
                    'ELEMENT_NAME' => 'Elements'
                ),
            )
        );

        $helper->Iblock()->addIblockTypeIfNotExists($arIBlockType);

        $iIBlockID = $helper->Iblock()->addIblockIfNotExists(array(
            'LID' => 's1',
            'IBLOCK_TYPE_ID' => 'CONTENT_RU',
            'CODE' => 'ANNOUNCEMENT',
            'NAME' => 'Объявления'
        ));

        $arProps = array(
            array(
                'NAME' => 'Этаж',
                'CODE' => 'FLOOR',
                'PROPERTY_TYPE' => 'S'
            ),
            array(
                'NAME' => 'Количество комнат',
                'CODE' => 'NUMBER_ROOMS',
                'PROPERTY_TYPE' => 'L',
                'LIST_TYPE' => 'L',
                'VALUES' => [
                    [
                        'XML_ID' => 'ONE_R',
                        'VALUE' => 'студия'
                    ],
                    [
                        'XML_ID' => 'ONE_R',
                        'VALUE' => '1'
                    ],
                    [
                        'XML_ID' => 'TWO_R',
                        'VALUE' => '2'
                    ],
                    [
                        'XML_ID' => 'THREE_R',
                        'VALUE' => '3'
                    ],
                    [
                        'XML_ID' => 'FOUR_R',
                        'VALUE' => '4'
                    ],
                    [
                        'XML_ID' => 'FIVE_R',
                        'VALUE' => '5'
                    ],
                    [
                        'XML_ID' => 'SIX_R',
                        'VALUE' => '6'
                    ],
                    [
                        'XML_ID' => 'SEVEN_R',
                        'VALUE' => '7'
                    ],
                    [
                        'XML_ID' => 'EIGHT_R',
                        'VALUE' => '8'
                    ],
                ]
            ),
            array(
                'NAME' => 'Общая площадь',
                'CODE' => 'TOTAL_AREA',
                'PROPERTY_TYPE' => 'S'
            ),
            array(
                'NAME' => 'Санузел',
                'CODE' => 'BATHROOM',
                'PROPERTY_TYPE' => 'L',
                'LIST_TYPE' => 'L',
                'VALUES' => [
                    [
                        'XML_ID' => 'COMBINED',
                        'VALUE' => 'совмещенный'
                    ],
                    [
                        'XML_ID' => 'SEPARATE',
                        'VALUE' => 'раздельный'
                    ],
                    [
                        'XML_ID' => 'SEVERAL',
                        'VALUE' => 'несколько'
                    ],
                ]
            ),
            array(
                'NAME' => 'Расположение',
                'CODE' => 'LOCATION',
                'PROPERTY_TYPE' => 'S',
                'MULTIPLE' => 'Y',
                'ROW_COUNT' => 3,
                'COL_COUNT' => 90
            ),
            array(
                'NAME' => 'Цена',
                'CODE' => 'PRICE',
                'PROPERTY_TYPE' => 'S'
            ),
            array(
                'NAME' => 'Дата размещения',
                'CODE' => 'DATE',
                'PROPERTY_TYPE' => 'S',
                'USER_TYPE' => 'DateTime'
            ),
        );
        if ($iIBlockID) {
            foreach ($arProps as $arProp) {

                $helper->Iblock()->addPropertyIfNotExists($iIBlockID, $arProp);
            }

            $helper->AdminIblock()->buildElementForm($iIBlockID, [
                'Основная информация' => [
                    'ACTIVE',
                    'PROPERTY_DATE',
                    'NAME' => 'Название объявления',
                    'PROPERTY_FLOOR',
                    'PROPERTY_NUMBER_ROOMS',
                    'PROPERTY_TOTAL_AREA',
                    'PROPERTY_BATHROOM',
                    'PROPERTY_PRICE',
                ],
                'Прочее' => [
                    'PROPERTY_LOCATION',
                ],
            ]);
        }

    }

    public function down() {
        $helper = new HelperManager();

        $helper->Iblock()->deleteIblockIfExists('ANNOUNCEMENT', 'CONTENT_RU');

    }

}
