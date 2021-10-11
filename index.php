<!DOCTYPE html>
<?php
include "header.php";
$pran=$_SESSION['name'];

?>

<html lang="en">
<body>

  <!-- <input name="searchTxt" type="text" maxlength="512" id="searchTxt" class="searchField"/>
  <button>Search</button>
  <script type="text/javascript">
  function searchURL(){
    // window.location = "http://www.myurl.com/search/" + (input text value);
    document.getElementById("searchTxt").value;
  }
</script> -->


<div class="container">
   <div class="row">
   <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
   <div class="row">

   <?php

     $conn = new mysqli('localhost', 'root', '', 'newton');
     if(isset($_GET['search'])){
        $searchKey = $_GET['search'];
        $sql = "SELECT * FROM input WHERE value LIKE '%$searchKey%'";
     }else
     $sql = "SELECT * FROM input";
     $result = $conn->query($sql);
   ?>

   <form action="" method="GET">
     <div class="col-md-6">
       <label for="site-search">Input Values:</label>
       <input type="search" id="site-search" name="q" aria-label="Search through site content">
       <label for="site-search">Search Values:</label>
        <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> >
     </div>
     <div class="col-md-6 text-left">
      <button class="" type="submit" name="submit1">Khoj</button>
     </div>
   </form>

   <?php
                 if(isset($_POST["submit1"]))
                 {


                   mysqli_query($link,"insert into input values('',$pran,'$_POST[q]','')");

                 }

                 ?>

   <br>
   <br>
</div>

<table class="table table-bordered">
  <tr>
     <th>Name</th>
     <th>input</th>
     <th>created</th>
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
     <td><?php echo $row->name ?></td>
     <td><?php echo $row->value ?></td>
     <td><?php echo $row->created ?></td>
  </tr>
  <?php endwhile; ?>
</table>
</div>
</div>
</div>





</body>
</html>
