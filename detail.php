<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<?php

require_once "db_connect.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription, date FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];
            $date = $row['date'];

            echo "<div class='container'>
            <h2>Todo: $title</h2>
            <a href='index.php'>Back</a>
            <h4>Description:</h4>
            <p>$description</p>
            <small>$date</small>
            
            </div>
            ";
        }
    }else{
        echo 'no todo';
    }
}