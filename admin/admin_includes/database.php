<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$db['host'] = "localhost";
$db['user'] = "root";
$db['password'] = "";
$db['database'] = "qnszt_gyak";
$db['driver'] = "mysqli";
$db['prefix'] = "";



foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
