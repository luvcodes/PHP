<?php 
function myTest() {
    static $x = 0; // 一般来说，function completed/executed，所有的变量都会被删除。
    echo $x;
    $x++;
}

myTest();  // call function
myTest();
myTest();
?>

<?php 
function myTest2() {
    $x2 = 0;
    echo $x2;
    $x2++;
}

myTest2();
myTest2();
myTest2();
?>