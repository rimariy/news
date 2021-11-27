<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'database.php';

    $sql = "INSERT INTO users (username, password)
            VALUES ('" . mysqli_escape_string($conn, $_POST['user']) . "',
                    '". mysqli_escape_string($conn, $_POST['password']) . "')";

    $results = mysqli_query($conn, $sql);

    if ($results === false) {

        echo mysqli_error($conn);

    } else {

       var_dump($sql);

        $id = mysqli_insert_id($conn);
        echo "Inserted record with ID: $id";

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="SS.css" />
</head>
<body>

    


<div class="container ">
 <center> <div class="row bb">
    <div class="col">
    <div class="firstPage">

<div class="d-flex justify-content-center">
  <h4 style="color: red">Register</h4>
</div>
<form method="post">
<div>
<label for="user">USERNAME</label><br>
<input name="user" id="user" >
</div>

<div>
<label for="password">PASSWORD</label><br>
<input type="password" name="password" id="password">
</div>
<button>Register</button> 
</form>


<h4 class="mt-3" style="color: red">Do you have an account ? <a href="login.php" style="color: red;">
LogIn
</a>
</h4>
</div>    </div>
  </div>
</center>
</div>



</body>
</html>