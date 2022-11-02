<?php
$OzStates[1] = "New South Wales";
$OzStates[2] = "South Australia";
$OzStates[4] = "Queensland";
$OzStates[6] = "Victoria";
// sizeof build-in function
echo "Size of array is " . sizeof($OzStates) . "<br/>";
// Value of current array is
echo "Value of current array is " . current($OzStates) . "<br/>";

// move to next element in the array
next($OzStates);
echo "Value of current array is " . current($OzStates) . "<br/>";

// display the index of current element
echo "Index of current element is " . key($OzStates) . "<br/>";

// move to previous element in the array
prev($OzStates);
echo "Value of current array is " . current($OzStates) . "<br/>";

end($OzStates);
