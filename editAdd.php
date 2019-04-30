<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php 
error_reporting(-1);
ini_set("display_errors","On");
//print_r($_POST["kanaat"]);
//include_once("db.php");
//print_r($_POST['dateData']);	
//$tarih = $_POST['dateData'];
//list($gun, $ay, $yil) = explode("-",$tarih);
//$tarih = $yil."-".$ay."-".$gun;

		if((isset($_POST['dateData']) && $_POST['dateData'] !='') 
		&& ((isset($_POST['data1']) && $_POST['data1'] !='' ) 
		|| (isset($_POST['data2']) && $_POST['data2'] !='') 
		|| (isset($_POST['data3']) && $_POST['data3'] !='' )
		|| (isset($_POST['data4']) && $_POST['data4'] !='' )
		|| (isset($_POST['data5']) && $_POST['data5'] !='' )
		|| (isset($_POST['data6']) && $_POST['data6'] !='' )
		|| (isset($_POST['data7']) && $_POST['data7'] !='' )
		|| (isset($_POST['data8']) && $_POST['data8'] !='' )

		)
		|| 
		((isset($_POST['data10']) && $_POST['data10'] !='' ) 
		|| (isset($_POST['data11']) && $_POST['data11'] !='') 
		|| (isset($_POST['data12']) && $_POST['data12'] !='' )
		|| (isset($_POST['data13']) && $_POST['data13'] !='' )
		|| (isset($_POST['data14']) && $_POST['data14'] !='' )
		|| (isset($_POST['data15']) && $_POST['data15'] !='' )
		|| (isset($_POST['data16']) && $_POST['data16'] !='' )
		|| (isset($_POST['data17']) && $_POST['data17'] !='' )

		)
		)
		{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "odyo";
				
				
				
				$kulakSolEmpty = 0;
				$kulakSagEmpty = 0;
				
				if((isset($_POST['data1']) && $_POST['data1'] !='' ) 
				|| (isset($_POST['data2']) && $_POST['data2'] !='') 
				|| (isset($_POST['data3']) && $_POST['data3'] !='' )
				|| (isset($_POST['data4']) && $_POST['data4'] !='' )
				|| (isset($_POST['data5']) && $_POST['data5'] !='' )
				|| (isset($_POST['data6']) && $_POST['data6'] !='' )
				|| (isset($_POST['data7']) && $_POST['data7'] !='' )
				|| (isset($_POST['data8']) && $_POST['data8'] !='' )
				)
				{
					$kulakSolEmpty = 1;
				}
				
				if((isset($_POST['data10']) && $_POST['data10'] !='' ) 
				|| (isset($_POST['data11']) && $_POST['data11'] !='') 
				|| (isset($_POST['data12']) && $_POST['data12'] !='' )
				|| (isset($_POST['data13']) && $_POST['data13'] !='' )
				|| (isset($_POST['data14']) && $_POST['data14'] !='' )
				|| (isset($_POST['data15']) && $_POST['data15'] !='' )
				|| (isset($_POST['data16']) && $_POST['data16'] !='' )
				|| (isset($_POST['data17']) && $_POST['data17'] !='' ))
				{
					$kulakSagEmpty = 1;					
				}
					
  	
			    // Create connection
				$conn1 = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn1->connect_error) {
					die("Connection failed: " . $conn1->connect_error);
				}
				
				if( $kulakSolEmpty == 1 ){
				$sql1 = "UPDATE odio_detay SET tarih='".$_POST['dateData']."',kulak='1',kanaat='".$_POST['kanaat']."',ikiyuzelli='".$_POST['data1']."',besyuz='".$_POST['data2']."',bir='".$_POST['data3']."',iki='".$_POST['data4']."',uc='".$_POST['data5']."',dort='".$_POST['data6']."',alti='".$_POST['data7']."',sekiz='".$_POST['data8']."' WHERE ID=".$_GET["id"];
				//print_r($sql1);
				if ($conn1->query($sql1) === TRUE) {
					echo "New record created successfully";
					//usleep(5000000);
					
				} else {
					echo "Error: " . $sql1 . "<br>" . $conn1->error;
				}
				}
				
				// Create connection
				$conn2 = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn2->connect_error) {
					die("Connection failed: " . $conn2->connect_error);
				}
				
				
				
				if( $kulakSagEmpty == 1 ){
				$sql2 = "UPDATE odio_detay SET tarih='".$_POST['dateData']."',kulak='2',kanaat='".$_POST['kanaat']."',ikiyuzelli='".$_POST['data10']."',besyuz='".$_POST['data11']."',bir='".$_POST['data12']."',iki='".$_POST['data13']."',uc='".$_POST['data14']."',dort='".$_POST['data15']."',alti='".$_POST['data16']."',sekiz='".$_POST['data17']."' WHERE ID=".$_GET["id"];
							
				//print_r($sql2);
				
				if ($conn2->query($sql2) === TRUE) {
					echo "New record created successfully";
					//usleep(5000000);
					
				} else {
					echo "Error: " . $sql2 . "<br>" . $conn2->error;
				}
				}
				
				$conn1->close();
					$conn2->close();
				
				header('Location: http://localhost:1000/odyometri/list.php');
				die();	
				
			
		}
		else
		{
								echo "<script type='text/javascript'> 
								alert('Kayýt verilerini Düzenli Giriniz!');
								window.location='http://localhost:1000/odyometri/form.php';
								</script>";
		//header('Location: http://localhost:1000/odyometri/form.php');
		//die();	
		}

?>