<?php
$OzStates[1] = "New South Wales";
$OzStates[2] = "South Australia";
$OzStates[4] = "Queensland";
$OzStates[6] = "Victoria";

foreach ($OzStates as $OzState) {
    echo $OzState . "<br />";
}
echo "<br />";

sort($OzStates);
foreach ($OzStates as $OzState) {
    echo $OzState . "<br />";
}

echo "<br />";
rsort($OzStates);
foreach ($OzStates as $OzState) {
    echo $OzState . "<br />";
}
