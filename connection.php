<?php

    // DB credentials.
	define('DB_HOST','localhost');
	define('DB_USER','admin');
	define('DB_PASS','SuperMan2018**');
	define('DB_NAME','quick');
    
    // connect to the database
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con){
        die("it is not possible to make the connection: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("the connection has failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>