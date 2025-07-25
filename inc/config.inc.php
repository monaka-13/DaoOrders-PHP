<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "DAOOrders");
define("DB_PORT", 3306);

date_default_timezone_set("America/Vancouver");
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);
ini_set('error_log', LOGFILE);

define('ITEM_PRICE', 99);
?>