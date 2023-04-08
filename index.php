<?php

require_once './db.php';

$db = db_connect();

$servicesAdapter = new ServicesAdapter($db);

$data = [];
$data['services'] = $servicesAdapter->getList();
$data['isMainPage'] = !isset($_GET['service']);

if (isset($_GET['service'])) {
    $data['selectedService'] = $servicesAdapter->getById($_GET['service']);
}

require_once './views/mainView.php';
