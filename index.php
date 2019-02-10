<?php
require_once("db_connect.php");
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription']; 

    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
       
    }else{
        echo mysqli_error($link);
    }

}
 ?>

<html>
<head>
    <title>YE SAB KARNA HAI </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h2>
Kuch kam bhi karlo  😉
</h2>



<form method="post" action="index.php">

<div class="form-group">
    <p>Todo title: </p>
    <input name="todoTitle" type="text" class="form-control">
    </div>
    <div class="form-group">
    
    <p>Todo description: </p>
    <input name="todoDescription" type="text" class="form-control">
    </div>
    <br>
    
    <input type="submit" name="submit" value="Add Task" class="btn btn-default">
</form>
<?php 
if(isset($insertTodo))
 echo "<div class='alert alert-success'> Aur ak kam dal diya 😊</div>";

if((isset($_GET['done'])))
 echo "<div class='alert alert-success'> Kuch toh kiya :)</div>";
?>

<?php
db();
global $link;
$query  = "SELECT id, todoTitle, todoDescription, date FROM todo";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['todoTitle'];
        $date = $row['date'];

        ?>

    <ul class="list-group">
        <li class="list-group-item">
        <a style="padding: 0px 10px;"href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a>
   <a href="edit.php?id=<?php echo $id?>" class="btn btn-warning">Edit</a>
   <a href="delete.php?id=<?php echo $id?>" class="btn btn-success">Done</a>
   </li>
   <?php echo "$date";?>
    </ul>

<?php
    }
}

?>
<p> No made with ❤️ shit done here.😝 </p>
</div>

</body>
</html>
