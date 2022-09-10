<?php 
/*
在function内部定义的变量具有局部变量的范围，只能在function内部访问
*/
function myTest() {
    $x = 5;
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();
// 在function外部使用x会生成error
echo "<p>Variable x outside function is: $x</p>";
?>