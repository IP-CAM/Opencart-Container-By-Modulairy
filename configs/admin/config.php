<?php
// APPLICATION
define('APPLICATION', 'Admin');


// HTTP
define('HTTP_SERVER', (getenv('HTTP_OPENCART', true) ?: (getenv('HOSTNAME').'/')) . 'admin/');
define('HTTP_CATALOG',  getenv('HTTP_OPENCART', true) ?: (getenv('HOSTNAME').'/'));

// DIR
define('DIR_OPENCART',  getenv('DIR_OPENCART', true)?:'/var/www/html/');
define('DIR_APPLICATION', DIR_OPENCART . 'admin/');
define('DIR_EXTENSION', DIR_OPENCART . 'extension/');
define('DIR_IMAGE', getenv('DIR_IMAGE',true));
define('DIR_SYSTEM', DIR_OPENCART . 'system/');
define('DIR_CATALOG', DIR_OPENCART . 'catalog/');
define('DIR_STORAGE', getenv('DIR_STORAGE', true));
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', getenv('DIR_CACHE', true));
define('DIR_DOWNLOAD', getenv('DIR_DOWNLOAD', true));
define('DIR_LOGS', getenv('DIR_LOGS', true));
define('DIR_SESSION', getenv('DIR_SESSION', true));
define('DIR_UPLOAD', getenv('DIR_UPLOAD', true));

// DB
define('DB_DRIVER', getenv('DB_DRIVER', true));
define('DB_HOSTNAME', getenv('DB_HOSTNAME', true));
define('DB_USERNAME', getenv('DB_USERNAME', true));
define('DB_PASSWORD', getenv('DB_PASSWORD', true));
define('DB_SSL_KEY', getenv('DB_SSL_KEY', true) ?: '');
define('DB_SSL_CERT', getenv('DB_SSL_CERT', true) ?: '');
define('DB_SSL_CA', getenv('DB_SSL_CA', true) ?: '');
define('DB_DATABASE', getenv('DB_DATABASE', true));
define('DB_PORT', getenv('DB_PORT', true));
define('DB_PREFIX', getenv('DB_PREFIX', true) ?: 'oc_');

// OpenCart API
define('OPENCART_SERVER', 'https://www.opencart.com/');
