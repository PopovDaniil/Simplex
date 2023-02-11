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
$data['isMainPage'] = !isset($_GET['service']);

if (isset($_GET['service'])) {
    $data['selectedService'] = $servicesAdapter->getById($_GET['service']);
}

require_once './main.php';
