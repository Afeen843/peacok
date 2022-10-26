<?php
include_once('Database/database.php');
include_once('admin/classes/db.php');
$pageIndexing =
    [
        'products' => 'products.php',
        'categories' => 'categories.php',
        'customers' => 'customers.php'
    ];

global $db, $admin, $frontend;
$db = new database();
$db->createConncetion();
$admin = new admin();


?>