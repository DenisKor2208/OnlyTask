<?

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class mylog_module extends CModule
{
    const MODULE_ID = 'mylog.module';

    public $MODULE_ID,
        $MODULE_VERSION,
        $MODULE_VERSION_DATE,
        $MODULE_NAME,
        $MODULE_DESCRIPTION,
        $PARTNER_NAME,
        $PARTNER_URI;

    public function __construct()
    {
        $arModuleVersion = array();
        include __DIR__ . 'version.php';

        $this->MODULE_ID 		   = str_replace("_", ".", get_class($this));
        $this->MODULE_VERSION 	   = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME =  Loc::getMessage('MYNAME_MODULE_NAME');
        $this->MODULE_DESCRIPTION =  Loc::getMessage('MYNAME_MODULE_MODULE_DESCRIPTION');
        $this->PARTNER_NAME =  Loc::getMessage("MYNAME_MODULE_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("MYNAME_MODULE_PARTNER_URI");
    }

    function InstallFiles($arParams = array())
    {
        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }

    public function DoInstall()
    {
        RegisterModule($this->MODULE_ID);

        $this->InstallFiles();
    }

    public function DoUninstall()
    {
        UnRegisterModule($this->MODULE_ID);

        $this->UnInstallFiles();
    }
}
