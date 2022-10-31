<?php 

$Data = array('status' => 'Success','message' => 'Payment done Successfully');

echo str_replace('null','""',json_encode($Data,JSON_PRETTY_PRINT));
?>