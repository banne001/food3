<?php

//Turn in error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
// Create a Session
session_start();
// require the autoload file

//require_once('model/data-layer.php');
//require_once('model/validation.php'); //@autoload. dont need to require


// create an instance of the Base class
$f3 = Base::instance();
$validator = new Validate();
$dataLayer = new DataLayer();
$order = new Order();
$controller = new Controller($f3);
$f3-> set('DEBUG', 3);

// define a default route (home page)
$f3 -> route ('GET /', function(){
    //echo "<h1> My Food Page </h1>";
    global $controller;
    $controller->home();
});

//Define an order route
$f3->route('GET|POST /order', function($f3) {
    global $controller;
    $controller->order();
});

//Define an order2 route
$f3->route('GET|POST /order2', function($f3) {
    global $controller;
    $controller->order2();
});

//Define a summary route
$f3->route('GET /summary', function() {
    global $controller;
    $controller->summary();
});

// run fat free
$f3->run();