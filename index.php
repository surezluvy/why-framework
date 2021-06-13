<?php
    $request = $_SERVER['REQUEST_URI'];
    $project_location = "/why-framework";

    require_once('setting/function.php');
    $route = new routes();

    // $route->get('url', 'namaController', 'namaFungsi');
    $route->get('/', 'mainController', 'index');
    $route->get('/create', 'mainController', 'create');
    $route->get('/create_blog', 'mainController', 'create_blog');

    // Digunakan ketika harus menerima data dari url
    // Misalnya delete/update yang memerlukan id yang dikirim dari url ($_GET)
    // $route->get('url', 'namaController', 'namaFungsi');
    if($_GET){
        $route->get('/delete?id='.$_GET['id'], 'mainController', 'delete');
        $route->get('/edit?id='.$_GET['id'], 'mainController', 'edit');
        $route->get('/process_edit?id='.$_GET['id'], 'mainController', 'edit');
    }

    // Digunakan ketika suatu proses yang bersangkutan dengan database
    // Misalnya proses membuat user
    // $route->post('formAction', 'namaTabel', 'redirectSetelahProsesSelesai');
    $route->post('/create_process', 'user', '/');

