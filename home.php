<?php
session_start();

?>
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
// $_SESSION['pname']="Science";

for ($i=0;$i < mysqli_num_rows($pro);$i++) {


    $row = mysqli_fetch_assoc($pro);

    foreach ($row as $value) {
      if(!is_numeric($value)){
        print "<li class=\"nav-item\"> "; 
        print "<a class=\"nav-link active\" aria-current=\"page\" href=\"articleByCategories.php\" value=$value onclick=\"pname1(value)\"> $value</a>";
        print "</li>";
    }
      }}
      print "</ul>";
        ?>
      </ul>
    </div>
  </div>
</nav> 
<!---navbar end--->


<!---articles-->
<div class="row row-cols-1 row-cols-md-3 g-4">

      <?php
    $sql = "SELECT * FROM article" ;
    $results = mysqli_query($conn, $sql);
    $idd=$conn or die ("Could not connect");
    $pro=mysqli_query($idd, "select * from article");
      
    for ($i=0;$i < mysqli_num_rows($pro);$i++) {
    
    
    $row = mysqli_fetch_array($pro);
    
         
    // print "<a class=\"nav-link active\" aria-current=\"page\" href=\"#\">$row[1]</a>";
    print "  <div class=\"col\">    ";
    print "  <div class=\"card\">    ";
    print "  <img src=\"logo.png\" class=\"card-img-top\" alt=\"...\">";  
    print "  <div class=\"card-body\">    ";
    print "  <h5 class=\"card-title\"> $row[2] </h5>    ";
    print "  <p class=\"card-text\"> $row[4] </p>    ";
    print " </div>";
    print " </div>";
    print " </div>";

    
    }
    ?>
<!-- </div> -->


<!----end articles--->







<script>
function pname1(value){
    sessionStorage.setItem('pname', value);
}

</script>
<?php
print $_SESSION['pname'];
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>