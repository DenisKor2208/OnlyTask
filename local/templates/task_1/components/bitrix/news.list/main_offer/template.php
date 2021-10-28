<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?php foreach ($arResult['ITEMS'] as $arItem): ?>
<a class="article-item article-list__item" href="<?= $arItem['PROPERTIES']['LINK']['VALUE']; ?>" data-anim="anim-3">
    <div class="article-item__background">
        <img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"
             data-src="<?= $arItem['PROPERTIES']['DATA_SRC']['VALUE']; ?>"
             alt="<?= $arItem['DETAIL_PICTURE']['ALT'];?>"/>
    </div>
    <div class="article-item__wrapper">
        <div class="article-item__title"><?= $arItem['NAME'];?></div>
        <div class="article-item__content"><?= $arItem['DETAIL_TEXT'];?></div>

    </div>
</a>
<?php endforeach; ?>