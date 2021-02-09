<?php

//Turn in error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create a Session
session_start();
// require the autoload file
require_once('vendor/autoload.php');
// create an instance of the Base class
$f3 = Base::instance();
$f3-> set('DEBUG', 3);

// define a default route (home page)
$f3 -> route ('GET /', function(){
    //echo "<h1> My Food Page </h1>";
    $view = new Template();
    echo $view->render("views/home.html");
});

//Define an order route
$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render("views/order.html");
});

//Define an order2 route
$f3->route('POST /order2', function() {
    // Getting Data from order 1
    //var_dump($_POST);
    if(isset($_POST['food'])){
        $_SESSION['food'] = $_POST['food'];
    }
    if(isset($_POST['meal'])){
        $_SESSION['meal'] = $_POST['meal'];
    }
    $view = new Template();
    echo $view->render("views/order2.html");
});

//Define a summary route
$f3->route('POST /summary', function() {
    //var_dump($_POST);
    //var_dump($_SESSION);

    if(isset($_POST['conds'])){
        $_SESSION['conds'] = implode(",", $_POST['conds']) ;
    }
    $view = new Template();
    echo $view->render("views/summary.html");
});

// run fat free
$f3->run();