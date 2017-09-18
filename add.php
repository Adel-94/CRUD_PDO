<?php
require_once ('dbcon.php');

if (isset($_POST['btn_submit'])) {
    $name= $_POST['st_name'];
    $surname =$_POST['st_surname'];
  if(!empty($name)) {
      try{
       $stmt = $con->prepare("INSERT INTO student(name,surname) VALUES (:name,:surname)");
       $stmt->execute(array(':name'=>$name,':surname'=>$surname));
       header('Location:index.php');
      }
      catch(PDOException $ex){
         $ex->getMessage();
      }
  }else {
      echo "input name";
  }
}
?>
<h2>Add new student</h2>
<form action="" method="post">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="st_name">
    </div>
    <div class="form-group">
        <label>Surname</label>
        <input type="text" name="st_surname">
    </div>

    <button type="submit" name="btn_submit">Submit</button>
</form>
