<!DOCTYPE html>
<html>
<head>
	<style>
			a:link, a:visited {
  background-color: #07151f;
  color: white;
  left:50%;
  padding: 14px 25px;
  text-align: center;
    display: block;
    margin: 0 auto;
  text-decoration: none;
  width:150px;
}

a:hover, a:active {
  background-color: #777;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bankdetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if(mysqli_connect_error())
			{
				die('Connect Error ('. mysqli_connect_errno() .') '
					.mysqli_connect_error());
			}

$no1=filter_input(INPUT_POST,'ACCNO1');
$no2=filter_input(INPUT_POST,'ACCNO2');
$amt=filter_input(INPUT_POST,'FUND');
$sql = "UPDATE details SET balance=balance-'$amt' where accno='$no1'";
$sql1="SELECT * FROM details WHERE accno='$no1'";
$result = $conn-> query($sql);
$result1 = $conn-> query($sql1);
$sql2 = "UPDATE details SET balance=balance+'$amt' where accno='$no2'";
$sql3="SELECT * FROM details WHERE accno='$no2'";
$result2 = $conn->query($sql2);
$result3 = $conn-> query($sql3);
if ($result1->num_rows > 0 && $result === TRUE && $result3->num_rows > 0 && $result2 === TRUE) {
  echo "<br>Money debited from your account<br>";
   echo "<br>Money credtied to other account<br>";
  echo "<br>Transfer Successfull<br>";
} else {
  echo "<br>Transcation failed check your account numbers.<br>" . $conn->error;

}




$conn->close();

?>
<a href="transfer.html">Go to previous page</a>
</body>
</html>