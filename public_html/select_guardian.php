<!DOCTYPE html>
<html>

<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/navigation.css">
</head>
<body>
<div class="container2">
<header>
  <div class="banner-container">  
  <a href="welcome.html">
  <h1 class = "banner">  
  <img src="images/logo.png" alt="Kid Security Logo">KID SECURITY NET 
  </h1>
  </a>
    </div>  
	<nav class="menubar">
	  <ul>
	  <li><a href="welcome.html">Home</a></li>
	  <li><a href="select_kid.php">View Kid</a></li>
	  <li><a href="select_guardian.php">View Guardian</a></li>
	  <li><a href="select_school.php">View School</a></li>
	  <li><a href="select_case.php">View Case</a></li>
	  <li><a href="select_department.php">View Police Department</a>
	  </ul>
	</nav>
</header>
<?php
require_once('db_setup.php');
$sql = "USE szhang73_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$sql = "SELECT * FROM GUARDIAN";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>Fname</th>
         <th>Lame</th>
         <th>K_ID</th>
          <th>Contact</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['FName']?></td>
          <td><?php echo $row['LName']?></td>
          <td><?php echo $row['K_ID']?></td>
          <td><?php echo $row['Contact']?></td>
      </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>  

</body>
</html>

