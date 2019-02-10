
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<?php
require_once 'db_connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];

            echo "
            <div class='container'>
                <h2>Edit Todo</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <div class='form-group'>
            <p>Title</p>
             <input type='text' name='title' value='$title' class='form-control'>
             </div>
             <p>Description</p>
             <div class='form-group'>
             <input type='text' name='description' value='$description' class='form-control'>
             <br>
             </div>
             <input type='submit' name='submit' class='btn btn-default' value='Edit'>
             <a href='index.php'>Back</a>
            </form>
            </div>
            ";
        }
    }else{
        echo "no todo";
    }


    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        db();
        $query = "UPDATE todo SET todoTitle = '$title', todoDescription = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $query);
        if($insertEdited){

            header('Location: index.php');
exit();
        }
        else{
            echo mysqli_error($link);
        }
    }


}

