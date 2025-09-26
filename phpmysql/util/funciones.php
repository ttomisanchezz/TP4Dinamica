<?php
function data_submitted() {
    $arr = !empty($_POST) ? $_POST : (!empty($_GET) ? $_GET : []);
    if ($arr) {
        foreach ($arr as $k => $v) {
            if ($v === "") { $arr[$k] = 'null'; }
        }
    }
    return $arr;
}

function verEstructura($e){
    echo "<pre>";
    print_r($e);
    echo "</pre>";
}

// --- AUTOCARGA MODERNA ---
spl_autoload_register(function ($class_name) {
    if (!isset($_SESSION['ROOT'])) { return; }

    $directories = [
        $_SESSION['ROOT'] . 'modelo/',
        $_SESSION['ROOT'] . 'modelo/conector/',
        $_SESSION['ROOT'] . 'control/',
        // $_SESSION['ROOT'] . 'util/class/',  // si llegás a tener esta carpeta
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
