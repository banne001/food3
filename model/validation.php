<?php
/*
 *
 */
class Validate
{
    private $_dataLayer;
    function __construct(){
        $this->_dataLayer = new DataLayer();
    }
    /**
     * validFood() returns true if is not empty
     */
    function validFood($food){
        //$validFood=array("tacos", "eggs". "pizza");
        return !empty($food) && ctype_alpha($food);
    }

    /** validMeal() returns true if the selected meal is in the list of valid options */
    function validMeal($meal)
    {
        $validMeals = $this->_dataLayer->getMeals();
        return in_array($meal, $validMeals);
    }

    /** validMeal() returns true if the selected meal is in the list of valid options */
    function validConds($conds)
    {
        $validConds = $this->_dataLayer->getCondiments();
        foreach ($conds as $cond) {
            if (!in_array($cond, $validConds)) {
                return false;
            }
        }
        return true;
    }

}