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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="logo.png" alt="" width="61" height="61"  class="d-inline-block align-text-top ">

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












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>