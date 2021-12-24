<?php

if (\Bitrix\Main\Loader::includeModule('mylog.module'))
{
    /* подписка на события которые будет обрабатывать обработчик */
	AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("\\Mylog\\Module\\Task\\MyModuleClass", "AddLog"));
	AddEventHandler("iblock", "OnAfterIBlockElementUpdate",  Array("\\Mylog\\Module\\Task\\MyModuleClass", "AddLog"));
}




