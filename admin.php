<?php
include './.env.php';
session_start();

if (isset($_POST['login'], $_POST['password']) && $_POST['login'] === $env['ADMIN_USER'] && $_POST['password'] === $env['ADMIN_PASSWORD']) {
    $_SESSION['user'] = $_POST['login'];
}

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header('Location: admin.php');
}


if (!isset($_SESSION['user'])) {
    require_once './views/loginView.php';
    return;
}

require_once './db.php';

$db = db_connect();

if (!empty($_GET['init'])) {
    db_migrate($db);
    db_seed($db);
}

$servicesAdapter = new ServicesAdapter($db);

$data = [];
$data['services'] = $servicesAdapter->getList();

if (!isset($_POST['id']) && isset($_POST['name'], $_POST['short_description'], $_POST['full_description'])) {
    $servicesAdapter->create($_POST['name'], $_POST['short_description'], $_POST['full_description']);
    header("Location: admin.php");
}

if (isset($_POST['id'], $_POST['name'], $_POST['short_description'], $_POST['full_description'], $_POST['serviceContent'])) {
    $servicesAdapter->update($_POST['id'], $_POST['name'], $_POST['short_description'], $_POST['full_description'], $_POST['serviceContent']);
}

if (isset($_GET['delete'])) {
    $servicesAdapter->delete($_GET['delete']);
    header("Location: admin.php");
}


if (isset($_GET['edit'])) {
    $data['selectedService'] = $servicesAdapter->getById($_GET['edit']);
    $data['serviceContent'] = $servicesAdapter->getContents($_GET['edit']);
}

if (isset($_GET['new'])) {
    $data['selectedService'] = [
        'id' => 0,
        'name' => '',
        'short_description' => '',
        'full_description' => '',
    ];
}

require_once './views/adminView.php';
