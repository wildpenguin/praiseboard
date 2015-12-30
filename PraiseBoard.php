<?php 
/**
* Author: wildpenguin@gmail.com
* Display a hall of fame style board of users based on some sort of quantity evaluation
* Ex: Henry solved 30 tickets this week and he gets the first place on our praise board (5 starts)
* Albert got only 22 tickets and now he has a reason to hate Henry ;)
*/

class PraiseBoard 
{

	private $_data;

	/**
	* Constructor takes data as parameter
	*/
	public function __construct($data = null)
	{
		if(!is_null($data))
			$this->_data = $data;
	}

	/**
	* Setter for private $_data 
	*/
	public function setData($data)
	{
		$this->_data = $data;
	}

	/**
	* Create stats from raw data (user / actions)
	* @return array()
	*/
	public function buildStats()
	{
		if(empty($this->_data))
			return array();

		if(count($this->_data) === 1)
			return $this->_data;

		$this->orderData();
		$this->quantityAsPercentage();

		return $this->_data;

	}

	/**
	* Sort data array by users accomplished tasks 
	*/
	public function orderData()
	{
		arsort($this->_data);
		return $this->_data;
	}
	
	/**
	* Find the max value from stats provided
	*
	*/
	public function findMaxValue()
	{
		return max(array_values($this->_data));
	}

	/**
	* Compare the measured quantity to the max value
	*/
	public function quantityAsPercentage()
	{
		$maxValue = $this->findMaxValue();

		array_walk($this->_data, function(&$value, &$key) use ($maxValue){
			$value = round($value / $maxValue, 2);
		});
		
		return $this->_data;
	}

	
}
?>