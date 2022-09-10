<?php 
/*
PHP has three different variable scopes:
    local
    global
    static
*/

// 全局变量只能在outside a function使用
$x = 5;
function myTest() {
    // using x inside this function will generate an error
    echo "<p>Variable x inside function is: $x</p>";
  }
myTest();
echo "<p>Variable x outside function is: $x</p>";
?>