<?php 

$con = mysqli_connect('localhost', 'root', '', 'aircraft');
if( !$con ){
    echo "<h1>Connection establishing error</h1>";
}