<?php 

if($_GET['id'] !='' && isset($_GET['id']))
{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "odyo";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		//echo $_SESSION['user_id'];
		$sql = "DELETE FROM odio_detay WHERE ID = '".$_GET['id']."'";
		//$result = $conn->query($sql);

		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header('Location: http://localhost:1000/odyometri/list.php');
			die();
		} else {
			echo "Error deleting record: " . $conn->error;
		}
}
else
{
	header('Location: http://localhost:1000/odyometri/list.php');
	die();
	
}
?>