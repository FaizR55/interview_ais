<?php
$DATA = [1 , -1 ,  3 , -4 ,  5 , -2 ,  7 ,  4 ,  2];
$array = array();

function array_duplicates(array $array)
{
    return array_diff_assoc($array, array_unique($array));
}

foreach ($DATA as $key => $value) {
$result = abs($value);
$array[] = $result;
$sort = sort($array);
$duplicates = array_duplicates($array);
}
?>

DATA :
<br/>
<?php print_r ($DATA); ?>
<br/>
<br/>

RETURN :
<br/>
<?php print_r ($duplicates); ?>