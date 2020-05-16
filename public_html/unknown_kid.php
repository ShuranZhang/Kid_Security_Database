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
  <a href=" ">
  <h1 class = "banner">  
  <img src="images/logo.png" alt="Kid Security Logo">KID SECURITY NET 
  </h1>
  </a >
    </div>  
 <nav class="menubar">
   <ul>
   <li><a href="welcome.html">Home</a ></li>
   <li><a href="select_kid.php">View Kid</a ></li>
   <li><a href="select_guardian.php">View Guardian</a ></li>
   <li><a href="select_school.php">View School</a ></li>
   <li><a href="select_case.php">View Case</a ></li>
   <li><a href="select_department.php">View Police Department</a >
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
$max = $_POST['Max'];
$min = $_POST['Min'];
$Sex = $_POST['Sex'];
$District = $_POST['District'];
$sql = "SELECT *
FROM KID
WHERE Age <= $max AND Age >= $min AND Sex='$Sex'AND District='$District';";

#$sql = "SELECT * FROM Students where Username like 'amai2';";
if(is_numeric($min)===FALSE){
    echo "Not valid input.";
}else if(is_numeric($max)===FALSE){
    echo "Not valid input.";  
}else if($min > $max){
    echo "Not valid input."; 
}
else if(($Sex!='F')&&($Sex!='M')){
    echo "Not valid input.";  
}else if(ctype_alpha($District)===FALSE){
    echo "Not valid input.";  
}else if(($District!='A')&&($District!='B')&&($District!='C')&&($District!='D')){
    echo "Not valid input.";
}else{
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
else {
echo "Item not found";
}
}

?>

    </table>

<?php
$conn->close();
?>  
<br>
<a href="unknown_kid.html">RETURN TO PREVIOUS FORM</a>
</body>
</html>
