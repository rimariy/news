<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="SS.css" />

  </head>
<body>




    <!---navbar--->
<nav class="navbar navbar-expand-lg navbar-light bg-light nbc">
  <div class="container-fluid nbc">
  <img src="logo.png" alt="" width="100px"   class="d-inline-block align-text-top ">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <?php
require 'database.php';
$sql = "SELECT * FROM categories" ;
$results = mysqli_query($conn, $sql);
$idd=$conn or die ("Could not connect");
$pro=mysqli_query($idd, "select * from categories");
$duser;
print "<ul class=\"navbar-nav\">";
  

for ($i=0;$i < mysqli_num_rows($pro);$i++) {

  print "<li class=\"nav-item\">";

    $row = mysqli_fetch_assoc($pro);

    foreach ($row as $value) {
      if(!is_numeric($value)){
        print "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">$value</a>";}
      }
      print "</li>";}
      print "</ul>";
        ?>
      </ul>
    </div>
  </div>
</nav> 
<!---navbar end--->
<hr>
<br>
<br>
<br>
<br>
<br>

<!--add categories-->
 <div class="container">
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categories'] )) {


    $sql = "INSERT INTO categories (categorie)
            VALUES ('" . mysqli_escape_string($conn, $_POST['categories']) . "')";

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
<form method="post">
<div>
<label for="categories"> add categories</label><br>
<input name="categories" id="categories" >
</div>
<button>add categiries</button> 
</form>

</div>
<!---end add categorie-->
<hr>
<br>
<br>
<br>
<br>
<br>

<!--add article-->

<div class="container">
<form method="post">
<div>
<label for="title1"> add title</label><br>
<input name="title1"  >
</div>
<div><label>Comments:<br>
            <textarea name = "description1"
               rows = "4" cols = "36">Enter description here.</textarea>
         </label></div>
<div>



<?php
print "<div>";
$sql = "SELECT * FROM categories" ;
$results = mysqli_query($conn, $sql);
$idd=$conn or die ("Could not connect");
$pro=mysqli_query($idd, "select * from categories");
print "<div>";
print "<strong>categories:</strong><br>";
for ($i=0;$i < mysqli_num_rows($pro);$i++) {
    $row = mysqli_fetch_assoc($pro);
    foreach ($row as $value) {
      if(!is_numeric($value)){
        print "<label>$value <input name = \" categorie\" type = \"radio\" 
                value = \"$value\" checked></label> ";      
      }
      }}
print "</div>"; 
print "<button>add article</button> "; 
print "</form>";
?>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categorie'])) {


  $sql = "INSERT INTO article (categories,title,description)
          VALUES ('" . mysqli_escape_string($conn, $_POST['categorie']) . "',
                  '" . mysqli_escape_string($conn, $_POST['title1']) . "',
                  '" . mysqli_escape_string($conn, $_POST['description1']) . "')";


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
      
<!---end add article-->
<hr>
<br>
<br>
<br>
<br>
<br>





<!---edit categorie-->
<br>
<br>
<br>
<div class="container">
        <form method="post">
<div>
    <label for="categorie">categorie</label>
    <input name="categorie"  >
</div>
<div>
    <label for="categorie2"> new categorie</label>
    <input name="categorie2"  >
</div>

<button>edit categorie</button>

</form>
</div>
<?php


if (isset($_POST['categorie']) && isset($_POST['categorie2'])) {


    $sql = "UPDATE  categories 
             SET categorie = '". $_POST['categorie2']. "'
             WHERE categorie = '". $_POST['categorie'] ."'";

    $results = mysqli_query($conn, $sql);
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        var_dump($results);
    }

} else {
    $article = null;
}

?>
<!---end edit categorie-->
<hr>
<br>
<br>
<br>
<br>
<br>




<!---delete categorie-->
<br>
<br>
<br>
<div class="container">
<form method="post">
<div>
    <label for="categorie3">categorie</label>
    <input name="categorie3"  >
</div>


<button>delete categorie</button>

</form>
</div>
<?php


if (isset($_POST['categorie3'])) {


  $sql = "DELETE FROM  categories WHERE categorie = '". $_POST['categorie3'] ."'";

  $results = mysqli_query($conn, $sql);

  if ($results === false) {

      echo mysqli_error($conn);

  } else {


      var_dump($results);
  }

} else {
  $article = null;
}



?>
<!---end delete categorie-->


<hr>
<br>
<br>
<br>
<br>
<br>


<!---edit article-->

<label for="title4"> old title</label><br>
<input name="title4"  >
</div>
<div class="container">
<form method="post">
<div>
<label for="title3"> add title</label><br>
<input name="title3"  >
</div>
<div><label>Comments:<br>
            <textarea name = "description1"
               rows = "4" cols = "36">Enter description here.</textarea>
</label></div>


<?php
print "<div>";
$sql = "SELECT * FROM categories" ;
$results = mysqli_query($conn, $sql);
$idd=$conn or die ("Could not connect");
$pro=mysqli_query($idd, "select * from categories");
print "<div>";
print "<strong>categories:</strong><br>";
for ($i=0;$i < mysqli_num_rows($pro);$i++) {
    $row = mysqli_fetch_assoc($pro);
    foreach ($row as $value) {
      if(!is_numeric($value)){
        print "<label>$value <input name = \" categorie7\" type = \"radio\" 
                value = \"$value\" checked></label> ";      
      }
      }}
print "</div>"; 
print "<button>add article</button> "; 
print "</form>";
?>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categorie7'])) {


  $sql = "UPDATE  article 
               SET categorie= '".$_POST['categorie7']. "',  title = '".$_POST['title3']. "',  description = '".$_POST['description1']. "'
               WHERE title = '".$_POST['title4']. "'";



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
      







<!---end edit article-->
<hr>
<br>
<br>
<br>
<br>
<br>
<!---delete article-->

<br>
<br>
<br>
<div class="container">
<form method="post">
<div>
    <label for="title5">article's title </label>
    <input name="title5"  >
</div>


<button>delete article</button>

</form>
</div>
<?php


if (isset($_POST['title5'])) {


  $sql = "DELETE FROM article WHERE title = '". $_POST['title5'] ."'";

  $results = mysqli_query($conn, $sql);

  if ($results === false) {

      echo mysqli_error($conn);

  } else {


      var_dump($results);
  }

} else {
  $article = null;
}
?>

<!---end delete article-->
<hr>
<br>
<br>
<br>
<br>
<br>
<script>
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>