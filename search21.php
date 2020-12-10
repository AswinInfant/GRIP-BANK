<!DOCTYPE html>
<html>
<head>
	<style>
		body
		{	
			background-color:white;
			color:green;
			font-family: Helvetica;
		}
		
		
		h2
		{	height: 10px;
			
			color: #07151f;
		}
		th {
			height: 50px;
			width: 150px;
			background-color: #777;
			color: #07151f;
		}
		td{
			text-align: center;
		height: 50px;
		width: 50px;
		color:green;
		}
		

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
	<table align="center" border="20px" >
		<tr>
			<th colspan="8"><h2>DETAILS</h2></th>
		</tr>
		<tr>
			<th>ACCNO</th>
			<th>NAME</th>
			<th>AGE</th>
			<th>EMAIL</th>
			<th>ACCTYPE</th>
			<th>BALANCE</th>
			<th>PHONENO</th>
			
		</tr>
		
		<?php
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="bankdetails";
			$conn=new mysqli ($host,$dbusername,$dbpassword,$dbname);
			if(mysqli_connect_error())
			{
				die('Connect Error ('. mysqli_connect_errno() .') '
					.mysqli_connect_error());
			}
			else
			{	$no1=filter_input(INPUT_POST,'ACCNO');
				
				$sql="SELECT * FROM details where accno='$no1'";
				$result=$conn-> query($sql);
				if($result-> num_rows > 0)
				{
					while($row=$result->fetch_assoc())
					{
						
						echo "<tr><td>".$row["accno"]."</td><td>".$row["name"]."</td><td>".$row["age"]."</td><td>".$row["email"]."</td><td>".$row["acctype"]."</td><td>".$row["balance"]."</td><td>".$row["phoneno"]."</td></tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "<tr><td>0 result</td></tr>";
					echo "</table>";
				}
				$conn->close();
			}
		?>

	</table>
	

	<a href="viewsingle.html">Go to previous page</a>
</body>
</html>