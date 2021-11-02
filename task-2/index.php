<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Задание 2 | ОНЛИ");
?><div class="contact-form__head">
	<div class="contact-form__head-title">
		 Связаться
	</div>
	<div class="contact-form__head-text">
		 Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом ваших требований
	</div>
</div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	"contacts_form", 
	array(
		"EMAIL_TO" => "zhg6n5qrnl4z@mail.ru",
		"EVENT_MESSAGE_ID" => array(
		),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "user_phone",
			3 => "user_job_info",
            4 => "MESSAGE",
		),
		"USE_CAPTCHA" => "N",
		"COMPONENT_TEMPLATE" => "contacts_form"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>