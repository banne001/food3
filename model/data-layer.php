<?php
/*
 * model/data-layer.php
 * returns data for my app
 */
class DataLayer{
    function getMeals(){

        return array("breakfast", "lunch", "dinner");
    }

    function getCondiments(){
        return array("mayonaise", "ketchup", "mustard", "Sriracha");
    }
}