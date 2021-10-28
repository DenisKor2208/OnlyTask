<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php use Bitrix\Main\Page\Asset; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php
    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
    Asset::getInstance()->addString('<link rel="shortcut icon" href="' . SITE_TEMPLATE_PATH . '/images/favicon.604825ed.ico" type="image/x-icon">');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/common.css");
    ?>
</head>
<body>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
<div id="barba-wrapper">
    <div class="article-list">