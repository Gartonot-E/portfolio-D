<?
require_once '../db.php';
$id = $_GET['id'];
$db->query("DELETE FROM `photo` WHERE `photo`.`id` = '".$id."'");
header("Location: /admin/photoedit.php");
?>