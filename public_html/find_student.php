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
    <figure>
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
$School_ID = $_POST['SchoolIID'];
$sql = "SELECT * FROM KID WHERE School_ID = $School_ID;";

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
         <th>Fname</th>
         <th>Lname</th>
         <th>ID</th>
         <th>Age</th>
         <th>Sex</th>
         <th>Address</th>
         <th>School_ID</th>
         <th>District</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){
?>
      <tr>
          <td><?php echo $row['Fname']?></td>
          <td><?php echo $row['Lname']?></td>
          <td><?php echo $row['ID']?></td>
          <td><?php echo $row['Age']?></td>
          <td><?php echo $row['Sex']?></td>
          <td><?php echo $row['Address']?></td>
          <td><?php echo $row['School_ID']?></td>
          <td><?php echo $row['District']?></td>
      </tr>

<?php
}
}
else if(is_numeric($School_ID)===FALSE){
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
<a href="find_student.html">RETURN TO PREVIOUS FORM</a>
</body>
</html>



