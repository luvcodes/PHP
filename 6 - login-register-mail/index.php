<?php
$dir = substr(dirname($_SERVER['PHP_SELF']),strlen($_SERVER['DOCUMENT_ROOT']));
$g = glob("*");
usort($g,function($a,$b) {
    if(is_dir($a) == is_dir($b))
        return strnatcasecmp($a,$b);
    else
        return is_dir($a) ? -1 : 1;
});
echo implode("<br>",array_map(function($a) {return '<a href="'.$a.'">'.$a.'</a>';},$g));