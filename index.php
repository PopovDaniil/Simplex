<?php

require_once './db.php';

$db = db_connect();

if (!empty($_GET['init'])) {
    db_migrate($db);
    db_seed($db);
}

$servicesAdapter = new ServicesAdapter($db);

$data = [];
$data['services'] = $servicesAdapter->getList();

require_once './main.php';
