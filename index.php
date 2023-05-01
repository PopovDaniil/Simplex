<?php

require_once './db.php';

$db = db_connect();

$servicesAdapter = new ServicesAdapter($db);

$data = [];
$data['isMainPage'] = false;

if (isset($_GET['service'])) {
    $data['selectedService'] = $servicesAdapter->getById($_GET['service']);
    $data['serviceContent'] = $servicesAdapter->getContents($_GET['service']);
} else {
    $data['services'] = $servicesAdapter->getList();
    $data['isMainPage'] = true;
}

require_once './views/mainView.php';
