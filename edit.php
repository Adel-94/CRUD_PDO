<?php
require_once ('dbcon.php');

if (isset($_POST['btn_submit'])) {
    $id= $_POST['txt_id'];

    $name= $_POST['st_name'];
    $surname =$_POST['st_surname'];
    if(!empty($name)) {
        try{
            $stmt = $con->prepare("UPDATE student SET name=:name , surname=:surname WHERE id=:id");
            $stmt->execute(array(':name'=>$name,':surname'=>$surname,'id'=>$id));
            if($stmt){
                header('Location:index.php');
            }

        }
        catch(PDOException $ex){
            $ex->getMessage();
        }
    }else {
        echo "input name";
    }

}
$id=0;
$name="";
$surname="";
if(isset($_GET['id'])) {

    $id =$_GET['id'];
    $stmt = $con->prepare('SELECT * FROM student WHERE id = :id');
    $stmt->execute(array(':id'=> $id));
    $row=$stmt->fetch();
    $id =$row['id'];
    $name=$row['name'];
    $surname=$row['surname'];
}
?>
<h2>Edit StudentList</h2>
<form action="" method="post">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="st_name" value="<?=$name;?>">
    </div>
    <div class="form-group">
        <label>Surname</label>
        <input type="text" name="st_surname" value="<?=$surname;?>" >
    </div>
    <input type="hidden" name="txt_id" value="<?=$id;?>">
    <button type="submit" name="btn_submit">Submit</button>
</form>
