<?php 

$Data = array('status' => 'Failed','message' => 'Payment Failed. Try again');

echo str_replace('null','""',json_encode($Data,JSON_PRETTY_PRINT));
?>