<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 04/01/2017
 * Time: 13:11
 */


$configPath='includes/datasite/config.json';

$config =   json_decode(file_get_contents($configPath),true);

$mongoClient=new MongoClient();//todo add connection string with data taken from $config object

$db=$mongoClient->selectDB($config["db"]["name"]);
