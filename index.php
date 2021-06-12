<?php
    // require_once('setting/function2.php');
    // $route = new routes();
    $request = $_SERVER['REQUEST_URI'];
    $project_location = "/why-framework";

    // $route->get($project_location, $request);
    // ======================================
    // require_once('setting/routes.php');

    // $project_location = "/why-framework";
    // $request = $_SERVER['REQUEST_URI'];

    // get($project_location, $request);

    require_once('setting/function2.php');
    $kot = new routes();

    $kot->get('/', 'main/read.php');
    $kot->get('/create', 'main/create.php');
    $kot->get('/create_blog', 'main/create_blog.php');

