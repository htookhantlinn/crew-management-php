<?php
class Human
{
    private string $name;
    private DateTime $dob;
    private int $age;

    function __construct(string $name, DateTime $dob, int $age)
    {
        $this->name = $name;
        $this->dob = $dob;
        $this->age = $age;
    }
    function getName(): string
    {
        return $this->name;
    }


    function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    function getDob(): DateTime
    {
        return $this->dob;
    }


    function setDob(DateTime $dob): self
    {
        $this->dob = $dob;
        return $this;
    }

    function getAge(): int
    {
        return $this->age;
    }


    function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function talk()
    {
        echo "I'm Human.";
    }
}


class Man extends Human
{
    private string $gender;

    function __construct(string $name, DateTime $dob, int $age, string $gender)
    {
        parent::__construct($name, $dob, $age);
        $this->gender = $gender;
    }

    public function talk()
    {
        echo "I'm a Man.";
    }
}

echo 'hello';


$fruits = ['abc','def','ghi','jkl'];
foreach ($fruits as $i) {
    echo $i . '<br/>';
}

