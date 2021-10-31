<?php

class Employee
{
    private $name;
    private $emp_id;
    private $dept;
    private $basic_salary;


    function getName()
    {
        return $this->name;
    }


    function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    function getEmp_id()
    {
        return $this->emp_id;
    }


    function setEmp_id($emp_id): self
    {
        $this->emp_id = $emp_id;
        return $this;
    }

    function getDept()
    {
        return $this->dept;
    }


    function setDept($dept): self
    {
        $this->dept = $dept;
        return $this;
    }
    function getBasic_salary()
    {
        return $this->basic_salary;
    }


    function setBasic_salary($basic_salary): self
    {
        $this->basic_salary = $basic_salary;
        return $this;
    }

    function __construct($name, $emp_id, $dept, $basic_salary)
    {
        $this->name = $name;
        $this->emp_id = $emp_id;
        $this->dept = $dept;
        $this->basic_salary = $basic_salary;
    }

    function getBonus($percentage)
    {
        return $this->basic_salary * ($percentage / 100);
    }
}



$emp1 = new Employee('john', 'emp_id', 'software', 650000);

echo '<h1>' . $emp1->getName() . "'s salary is " . $emp1->getBonus(2.5) + $emp1->getBasic_salary() . '</h1>';

echo date_default_timezone_set('Myanmar/Yangon');
echo $date = date('d-m-y h:i:s');
