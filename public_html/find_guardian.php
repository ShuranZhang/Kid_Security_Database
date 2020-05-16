<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
 <link rel="stylesheet" type="text/css" href="css/navigation.css">
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
$K_ID = $_POST['K_ID'];
$sql = "SELECT * FROM GUARDIAN where K_ID = $K_ID;";

#$sql = "SELECT * FROM Students where Username like 'amai2';";
$result = $conn->query($sql);

if($result->num_rows > 0){
 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>
   <table class="table table-striped">
      <tr>
         <th>FName</th>
         <th>LName</th>
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
else if(is_numeric($K_ID)===FALSE){
echo "Input is not valid";
}else{
  echo "Item not found";
}
?>

    </table>

<?php
$conn->close();
?>  
<br>
<a href="find_guardian.html">RETURN TO PREVIOUS FORM</a>
</body>
</html>


