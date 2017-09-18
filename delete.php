<?php
require_once ('dbcon.php');
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  try{
 $stmt=$con->prepare("DELETE FROM student WHERE id=?");
 $stmt->execute(array($id));
 header('location:index.php');
  }catch (PDOException $ex){
      echo $ex->getMessage();
  }
}

?>