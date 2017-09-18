<?php
require_once ('dbcon.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Myform</title>
</head>

<h2>Studentlist </h2>
<a href="add.php"> Add Student </a> <br/><br/>
<table border="1px" cellpadding="5px" cellspacing="0">
    <tr>

        <th>id</th>
        <th>name</th>
        <th>surname</th>
        <th>Action</th>
    </tr>
    <?php


    $stmt = $con->prepare('SELECT * FROM student');
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach ($result as $row) {
        ?>
        <tr>
            <td><?=$row['id'];?></td>
            <td><?=$row['name'];?></td>
            <td><?=$row['surname'];?></td>
            <td>
                <a href="edit.php?id=<?=$row['id']?>">Edit</a>
                <a href="delete.php?id=<?=$row['id']?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>

</table>

</body>
</html>
