<?php 
				error_reporting(-1);
				ini_set("display_errors","On");
			//print_r($_GET["id"]);	
if(empty($_GET["id"]) || $_GET["id"] ==''){
	header("Location:http://localhost:1000/odyometri/list.php");
	die();
} else {
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
				
				$sql = 'SELECT * FROM odio_detay WHERE ID='.$_GET['id'];
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {	
				
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Form</title>
 <!-- Bootstrap core CSS
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!-- Bootstrap Date-Picker Plugin -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
 <!--<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <!--<script src="bootstrap/js/popper.min.js"></script>-->
 </head>
 <body>
 
 <div class="panel panel-primary">
  <div class="panel-heading">Odyometri</div>
  <div class="panel-body">

 
<div class="container">

<label >Tahlil/Tetkik Tarihi</label>
  

 <form action="/odyometri/editAdd.php?id=<?=$_GET["id"];?>" method="post" name="formValues" >
 
   <!--<input type="hidden" name="solSagKulak" value="<?=$row["kulak"];?>" />-->
 <div class="form-group">
                
	<div class='input-group date' id='datetimepicker1'>
                    <?php 
					
					echo '<input type="text" value="'.$row["tarih"].'" class="form-control" name="dateData" required />';
					?>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
		<script type="text/javascript">
            $(function () {
  $("#datetimepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
			
			
        </script>		
	</div>			
				
   <div class="form-group">
  <label for="comment">Kanaat</label>
  <?php 
  echo '<textarea class="form-control" rows="5" id="comment" name="kanaat">'.$row["kanaat"].'</textarea>';
  ?>
  <span class="help-block">0-255</span>
</div> 


  <div class="form-group">
  <label >Sonuc</label>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th>250 Hz</th>
        <th>500 Hz</th>
		<th>1 kHz</th>
        <th>2 kHz</th>
		<th>3 kHz</th>
        <th>4 kHz</th>
		<th>6 kHz</th>
        <th>8 kHz</th>
		<th>SSO</th>
        
      </tr>
    </thead>
    <tbody>
     <?php 
	   if($row["kulak"]==1){ ?> 
       <tr>
	   <td>Sol Kulak</td>
       <?php 
	   echo '<td><input type="text" class="form-control" id="data1" name="data1" value="'.$row["ikiyuzelli"].'"></td>';
       echo '<td><input type="text" class="form-control" id="data2" name="data2" value="'.$row["besyuz"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data3" name="data3" value="'.$row["bir"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data4" name="data4" value="'.$row["iki"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data5" name="data5" value="'.$row["uc"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data6" name="data6" value="'.$row["dort"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data7" name="data7" value="'.$row["alti"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data8" name="data8" value="'.$row["sekiz"].'"></td>';
	   echo '<td><span class="label label-info" id="sso1" name="sso1">'.$row["SSO"].'</span></td>';
	   ?>
	   </tr>
	  <?php } 
      
	   if($row["kulak"]==2){ 
	  ?>
	  <tr>
        <td>Sag Kulak</td>
		<?php 
       echo '<td><input type="text" class="form-control" id="data10" name="data10" value="'.$row["ikiyuzelli"].'"></td>';
       echo '<td><input type="text" class="form-control" id="data11" name="data11" value="'.$row["besyuz"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data12" name="data12" value="'.$row["bir"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data13" name="data13" value="'.$row["iki"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data14" name="data14" value="'.$row["uc"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data15" name="data15" value="'.$row["dort"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data16" name="data16" value="'.$row["alti"].'"></td>';
	   echo '<td><input type="text" class="form-control" id="data17" name="data17" value="'.$row["sekiz"].'"></td>';
	   echo '<td><span class="label label-info" id="sso2" name="sso2">'.$row["SSO"].'</span></td>';
      ?>
	  </tr>
      <?php 
	   }
	  ?>
    </tbody>
  </table>
  </div>
  <div class="panel-body">
   <button type="button" class="btn btn-default float-left"><a href="http://localhost:1000/odyometri/list.php">iptal</a></button>
   <button type="submit" class="btn btn-primary float-right">guncelle</button>
</div>
   </form> 

</div>
</div>
 </body>
 </html>
 
 <?php 

					}
					$conn->close();
				}
 else {
				$conn->close();
				echo "<script type='text/javascript'> 
				alert('Hata Olustu!');
				window.location='http://localhost:1000/odyometri/list.php';
				</script>";
				}
			}	
			?>