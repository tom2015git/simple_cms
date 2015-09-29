<?php

$cmd="shutdown -s";
exec( $cmd,$out); 
var_dump($out); 
echo '<br>'; 
var_dump($cmd); 

?>