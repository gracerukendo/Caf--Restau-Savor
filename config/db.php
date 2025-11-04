<?php 
//declarer la connexion sur une base MySql 
//L'instance New PDO de php ??
try{
    $mysql=new PDO('mysql:host=localhost; dbname=bruxeldb', 'root', '');
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   
}catch(Exception $e){
    die($e->getMessage());
}