<?php 
$x = 5;
$y = 10;

function myTest() {
    global $x, $y; // 使用global关键词来将全局变量也可以在function内部可以访问 
                   // PHP also stores all global variables in an array called $GLOBALS[index]
    $y = $x + $y;
}

myTest();
echo $y;
?>

<?php 
$x2 = 5;
$y2 = 10;

function myTest2() {
    $GLOBALS['y2'] = $GLOBALS['x2'] + $GLOBALS['y2'];
}

myTest2();
echo $y2;
?>