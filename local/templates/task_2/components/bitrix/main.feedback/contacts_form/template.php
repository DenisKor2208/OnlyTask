<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?if($arResult["OK_MESSAGE"] <> ''): ?>
    <div class="alert alert-success"><?=$arResult["OK_MESSAGE"]?></div>
<?endif;?>
<form class="contact-form__form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
    <?=bitrix_sessid_post()?>
    <div class="contact-form__form-inputs">

        <div class="input contact-form__input">
            <label class="input__label" for="medicine_name">
                <div class="input__label-text"><?=GetMessage("MFT_NAME");?>
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>
                    *
                    <?endif;?>
                </div>
                <input class="input__input" type="text" id="medicine_name" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"
                       <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>required=""<?endif;?>>
                <?if(!empty($arResult["ERROR_MESSAGE"]["user_name"])):?>
                <div class="invalid+"><?=$arResult["ERROR_MESSAGE"]["user_name"];?></div>
                <?endif;?>
            </label>
        </div>

        <div class="input contact-form__input">
            <label class="input__label" for="medicine_company">
                <div class="input__label-text"><?=GetMessage("MFT_USER_JOB_INFO");?>
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_job_info", $arParams["REQUIRED_FIELDS"])):?>
                        *
                    <?endif;?>
                </div>
                <input class="input__input" type="text" id="medicine_company" name="user_job_info" value=""
                       <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_job_info", $arParams["REQUIRED_FIELDS"])): ?>required=""<?endif;?>>
                <?if(!empty($arResult["ERROR_MESSAGE"]["user_job_info"])):?>
                    <div class="invalid+"><?=$arResult["ERROR_MESSAGE"]["user_job_info"];?></div>
                <?endif;?>
            </label>
        </div>

        <div class="input contact-form__input">
            <label class="input__label" for="medicine_email">
                <div class="input__label-text"><?=GetMessage("MFT_EMAIL");?>
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>
                        *
                    <?endif;?>
                </div>
                <input class="input__input" type="email" id="medicine_email" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"
                       <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])): ?>required=""<?endif;?>>
                <?if(!empty($arResult["ERROR_MESSAGE"]["user_email"])):?>
                    <div class="invalid+"><?=$arResult["ERROR_MESSAGE"]["user_email"];?></div>
                <?endif;?>
            </label>
        </div>

        <div class="input contact-form__input">
            <label class="input__label" for="medicine_phone">
                <div class="input__label-text"><?=GetMessage("MFT_PHONE");?>
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_phone", $arParams["REQUIRED_FIELDS"])):?>
                        *
                    <?endif;?>
                </div>
                <input class="input__input" type="tel" id="medicine_phone"
                       data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
                       x-autocompletetype="phone-full" name="user_phone" value=""
                       <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_phone", $arParams["REQUIRED_FIELDS"])): ?>required=""<?endif;?>>
                <?if(!empty($arResult["ERROR_MESSAGE"]["user_phone"])):?>
                    <div class="invalid+"><?=$arResult["ERROR_MESSAGE"]["user_phone"];?></div>
                <?endif;?>
            </label>
        </div>
    </div>
    <div class="contact-form__form-message">
        <div class="input">
            <label class="input__label" for="medicine_message">
                <div class="input__label-text"><?=GetMessage("MFT_MESSAGE")?>
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?>
                        *
                    <?endif;?>
                </div>
                <textarea class="input__input" type="text" id="medicine_message" name="MESSAGE" value=""
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])): ?>required=""<?endif;?>>
                </textarea>
                <?if(!empty($arResult["ERROR_MESSAGE"]["MESSAGE"])):?>
                    <div class="invalid+"><?=$arResult["ERROR_MESSAGE"]["MESSAGE"];?></div>
                <?endif;?>
            </label>
        </div>
    </div>
    <div class="contact-form__bottom">
        <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
            ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
            данных&raquo;.
        </div>
        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        <input class="form-button contact-form__bottom-button"
               type="submit"
               data-success="Отправлено"
               data-error="Ошибка отправки"
               name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
    </div>
</form>