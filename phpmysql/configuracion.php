<?php
// -----------------------------------------------------
// CONFIG DE PATHS (sin depender de nombres ni espacios)
// -----------------------------------------------------
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Ruta absoluta a la carpeta *phpmysql* (donde está este archivo)
$ROOT = rtrim(str_replace('\\','/', __DIR__), '/') . '/';
$_SESSION['ROOT'] = $ROOT;

// Incluye helpers
include_once $ROOT.'util/funciones.php';

// -----------------------------------------------------
// URL base para navegar (ajusta si tu carpeta difiere)
// -----------------------------------------------------
$BASE_URL = 'http://'.$_SERVER['HTTP_HOST'].'/TP4Dinamica/phpmysql/';
$INICIO    = $BASE_URL.'vista/menu.php';     // si no existe, cambialo
$PRINCIPAL = $BASE_URL.'vista/menu.php';       // si no existe, cambialo

// -----------------------------------------------------
// CONFIG BD
// -----------------------------------------------------
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'tp4');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// (opcional) evitar cache en dev
header("Cache-Control: no-cache, must-revalidate");
