<?php

define('ROOT_DIR', str_replace('public', '', $_SERVER['DOCUMENT_ROOT'])); //т.к. $_SERVER['DOCUMENT_ROOT'] = '... /public'
define('CONFIG_DIR', ROOT_DIR . 'config/');
define('MODELS_DIR', ROOT_DIR . 'models/');
define('SERVICES_DIR', ROOT_DIR . 'services/');