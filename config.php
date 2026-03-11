<?php
// config.php
// Conexión simple a MySQL (XAMPP) usando PDO.
// En XAMPP normalmente: usuario root y contraseña vacía.

ini_set('display_errors', '1');
error_reporting(E_ALL);

define('DB_HOST', 'localhost');
define('DB_NAME', 'crud_clientes');
define('DB_USER', 'root');
define('DB_PASS', ''); // en XAMPP suele ser ""

function db(): PDO
{
    // static = se crea 1 vez y se reutiliza
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    // DSN = datos de conexión a MySQL + base de datos + charset
   $dsn = 'mysql:host=localhost;port=3307;dbname=crud_clientes;charset=utf8mb4';

    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Para que los errores salgan claros en clase
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}


