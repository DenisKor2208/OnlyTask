<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("task 3");
?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "categories", Array(
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
		"FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
		"HIDE_SECTION_NAME" => "N",	// Не показывать названия подразделов
		"IBLOCK_ID" => "4",	// Инфоблок
		"IBLOCK_TYPE" => "content",	// Тип инфоблока
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_FIELDS" => array(	// Поля разделов
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства разделов
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
		"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
		"VIEW_MODE" => "TILE",	// Вид списка подразделов
		"COMPONENT_TEMPLATE" => ".default",
		"SHOW_ANGLE" => "Y",
		"OFFSET_MODE" => "N",
		"LIST_COLUMNS_COUNT" => "6"
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"template2",
	Array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "template2",
		"DETAIL_ACTIVE_DATE_FORMAT" => "j M Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"",1=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"",1=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "arrFilter",
		"FILTER_PROPERTY_CODE" => array(0=>"",1=>"",),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "j M Y",
		"LIST_FIELD_CODE" => array(0=>"",1=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"",1=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/task-3/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"task-3/","section"=>"#SECTION_CODE_PATH#/","detail"=>"#SECTION_CODE_PATH#/#ELEMENT_CODE#",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>