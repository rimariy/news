<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="SS.css" />
</head>
<body>
<?php



require 'database.php';

if (isset($_GET['user']) && isset($_GET['password1'])) {

    // var_dump("SELECT * FROM logint WHERE username = '" . $_GET['user'] . "' AND  password = '" . $_GET['password1']) . "'";      

    $sql = "SELECT * FROM logint WHERE username = '" . $_GET['user'] . "' AND  password = '" . $_GET['password1'] . "'" ;

    $results = mysqli_query($conn, $sql);

    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $article = mysqli_fetch_assoc($results);
        var_dump($article);
    }

} else {
    $article = null;
}
?>


<div class="container ">
 <center> <div class="row bb">
    <div class="col">
    <div class="firstPage">

<div class="d-flex justify-content-center">
  <h4 style="color: red">login</h4>
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


<h4 class="mt-3" style="color: red">Do you have an account ? <a href="register.php" style="color: red;">
Register
</a>
</h4>
</div>    </div>
  </div>
</center>
</div>


</body>
</html>