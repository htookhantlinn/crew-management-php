<?php

class Employee
{
	private $eid;
	private $name;

	function __construct($eid, $name)
	{
		$this->eid = $eid;
		$this->name = $name;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getEid()
	{
		return $this->eid;
	}

	/**
	 * 
	 * @param mixed $eid 
	 * @return Employee
	 */
	function setEid($eid): self
	{
		$this->eid = $eid;
		return $this;
	}

	/**
	 * 
	 * @return mixed
	 */
	function getName()
	{
		return $this->name;
	}

	/**
	 * 
	 * @param mixed $name 
	 * @return Employee
	 */
	function setName($name): self
	{
		$this->name = $name;
		return $this;
	}
	/**
	 * @param $eid mixed 
	 * @param $name mixed 
	 */

	public function display()
	{
		echo '<br/>This is display function from emloyee class <br/>';
	}
}

class Sales extends Employee
{
	private $dept;

	/**
	 * @param $dept mixed 
	 */
	function __construct($eid, $name, $dept)
	{
		parent::__construct($eid, $name);
		$this->dept = $dept;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDept()
	{
		return $this->dept;
	}

	/**
	 * 
	 * @param mixed $dept 
	 * @return Sales
	 */
	function setDept($dept): self
	{
		$this->dept = $dept;
		return $this;
	}

	public function display()
	{
		parent::display();
		echo '<br/>This is function from sale<br/>';
	}
}
$emp1 = new Employee('1', 'htookhantlinn');
echo $emp1->getName();
$emp1->display();

echo '///////////';

$sale =new Sales('2','mg mg','sales');
echo $sale->display();

?>

<body class=" text-white" style="background-color: black;">
	

</body>