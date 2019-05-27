<?php

$DB_host="localhost";
$DB_user="root";
$db_pass="";
$DB_name="boot_pdo";

try
{
    $db=new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$db_pass);
} catch (Exception $ex) {
echo $ex->getMessage();
}

include 'Crud.php';

$crud = new Crud($db);