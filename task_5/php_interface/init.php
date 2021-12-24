<?php

require_once __DIR__ . '/vendor/autoload.php';

if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/my_functions.php")) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/my_functions.php");
}
