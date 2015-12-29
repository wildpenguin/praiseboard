<?php 
/**
* Praise board tests
*/

require_once 'PraiseBoard.php';

class PraiseBoardTest extends PHPUnit_Framework_TestCase 
{

	var $praiseBoard;

	protected function setUp() 
	{
		$this->praiseBoard = new PraiseBoard;
	}

	protected function tearDown()
	{
		unset($this->praiseBoard);
	}

	public function testEmptyData()
	{
		$this->praiseBoard->setData(array());
		$result = $this->praiseBoard->buildStats();
		$this->assertTrue($result === array());
	}

	public function testOneUserData()
	{
		$data = array('john'=>32);
		$this->praiseBoard->setData($data);
		$result = $this->praiseBoard->buildStats();
		$this->assertEquals($result, $data);
	}

	public function testOrderData()
	{
		$this->praiseBoard->setData(array(
			'john'=>32,
			'mary'=>21,
			'jonathan'=>309,
			'sarah'=>454
		));

		$result = $this->praiseBoard->orderData();

		$this->assertEquals($result, array(
			'sarah'=>454,
			'jonathan'=>309,
			'john'=>32,
			'mary'=>21,
		));
	}

	public function testFindMaxValue()
	{
		$this->praiseBoard->setData(array(
			'vincent'=>20,
			'mary'=>43,
			'caleb'=>29,
		));
		$maxValue = $this->praiseBoard->findMaxValue();
		$this->assertEquals($maxValue, 43);
	}

	public function testBuildStats()
	{
		$this->praiseBoard->setData(array(
			'sarah'=>10,
			'jonathan'=>20,
			'john'=>30,
			'mary'=>5,
		));

		$result = $this->praiseBoard->buildStats();
		$this->assertEquals($result, array(
			'john'=>1,
			'jonathan'=>0.66,
			'sarah'=>0.33,
			'mary'=>0.16
		));

	}
	

}

?>