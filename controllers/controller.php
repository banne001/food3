<?php
//controllers/controller.php

class Controller
{

    private $_f3;

    /**
     * Controller constructor.
     * @param $_f3
     */
    public function __construct($_f3)
    {
        $this->_f3 = $_f3;
    }

    /**
     * Display home page
     */
    function home(){
        $view = new Template();
        echo $view->render("views/home.html");
    }

    /**
     * Display First Order page
     */
    function order(){
        global $validator;
        global $dataLayer;
        global $order;
        //Add data from form1 to session Array
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $userFood = trim($_POST['food']);
            $userMeal = $_POST['meal'];

            //If the data is valid --> Store in session
            if($validator->validFood($userFood)) {
                //$_SESSION['food'] = $userFood;
                $order->setFood($userFood);
            }
            else {
                $this->_f3->set('errors["food"]', "Food cannot be blank and must only characters");
            }

            if($validator->validMeal($userMeal)) {
                //$_SESSION['meal'] = $userMeal;
                $order->setMeal($userMeal);
            }
            else {
                $this->$this->_f3->set('errors["meal"]', "Select a meal");
            }
            if(empty($this->_f3->get('errors'))){
                $_SESSION['order'] = $order;
                $this->_f3->reroute("/order2");
            }
        }
        $this->_f3->set("meals", $dataLayer->getMeals());
        $this->_f3->set('userFood', isset($userFood) ? $userFood: "");
        $this->_f3->set('userMeal', isset($userMeal) ? $userMeal : "");
        //$meals = getMeals();
        //var_dump($meals);
        $view = new Template();
        echo $view->render("views/order.html");
    }

    function order2(){
        global $validator;
        global $dataLayer;

        // Getting Data from order 1
        //var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['conds'])) {
                $userCondiments = $_POST['conds'];
                if ($validator->validConds($userCondiments)) {
                    $_SESSION['order']->setCondiments(implode(", ", $userCondiments));
                } else {
                    $this->_f3->set('errors["conds"]', "STOP SPOOFING");
                }
            }
            if(empty($this->_f3->get('errors'))){
                $this->_f3->reroute("/summary");
            }
        }
        $this->_f3->set("conds", $dataLayer->getCondiments());
        $view = new Template();
        echo $view->render("views/order2.html");
    }

    function summary(){
        //var_dump($_POST);
        //var_dump($_SESSION);
        $view = new Template();
        echo $view->render("views/summary.html");

        session_destroy();
    }
}