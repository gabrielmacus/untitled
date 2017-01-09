<?php
/**
 * Created by PhpStorm.
 * User: Luis Garcia
 * Date: 09/01/2017
 * Time: 01:53 AM
 */

$site= "productos";
$action="add";
$urlOnSave="action.php?act=add&type=products";

$isEdit=false;


if(isset($_GET["id"]))
{

   $urlOnSave="action.php?act=edit&type=products&id={$_GET['id']}";
   $isEdit=true;
}

include ("includes/templates/{$site}/{$action}.php");

