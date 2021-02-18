<?php
class Order{
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * @return mixed
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * @param String $food
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * @return String
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * @param String $meal
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * @return String
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * @param String $condiments
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }


}