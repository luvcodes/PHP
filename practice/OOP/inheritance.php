<?php
include ("employee.php");
$ryan = new employee("ryan yang", "21");
echo "fullname: " . $ryan->getName() . ", age: " . $ryan->getAge();
