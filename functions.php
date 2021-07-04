<?
// include database
require_once 'db.php';

/**
 * Add Like after click to heart
 */
if(!empty($_POST['id']) && !empty($_POST['like'])) {
    $id = $_POST['id'];
    $like = $_POST['like'];
    $db->query("UPDATE `photo` SET `likes` = '".$like."' WHERE `photo`.`id` = ".$id."");
}