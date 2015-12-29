<?php 
/**
* Author: wildpenguin@gmail.com
* Display a hall of fame style board of users based on some sort of quantity evaluation
* Ex: Henry solved 30 tickets this week and he gets the first place on our praise board (5 starts)
* Albert got only 22 tickets and now he has a reason to hate Henry ;)
*/

class PraiseBoard 
{

	private $data;

	public function __construct($data = null)
	{
		if(!is_null($data))
			$this->data = $data;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	* Create stats from raw data (user / actions)
	* @return array()
	*/
	public function buildStats()
	{
		if(empty($this->data))
			return array();

		if(count($this->data) === 1)
			return $this->data;

		$this->orderData();
		$this->quantityAsPercentage();

		return $this->data;

	}

	/**
	* Sort data array by users accomplished tasks 
	*/
	public function orderData()
	{
		asort($this->data);
		return $this->data;
	}
	
	/**
	* Find the max value from stats provided
	*
	*/
	public function findMaxValue()
	{
		return max(array_values($this->data));
	}

	/**
	* Compare the measured quantity to the max value
	*/
	public function quantityAsPercentage()
	{
		$maxValue = $this->findMaxValue();

		array_walk($this->data, function(&$value, &$key) use ($maxValue){
			$value = round($value / $maxValue, 2);
		});
		
		return $this->data;
	}

	
}
?>