<?php 
				error_reporting(-1);
				ini_set("display_errors","On");
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
				if(empty($_GET["sort"]) || $_GET["sort"]==''){
				$sql = "SELECT * FROM odio_detay order by tarih desc";
				$result = $conn->query($sql);
				}
				else if($_GET["sort"]=="asc")
				{
				$sql = "SELECT * FROM odio_detay order by tarih asc";
				$result = $conn->query($sql);	
				}
				else
				{
				$sql = "SELECT * FROM odio_detay order by tarih desc";
				$result = $conn->query($sql);	
				}
				
				
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Odyometri Listesi</title>
 <!-- Bootstrap core CSS-->
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
	  $("#checker").click(function(){
		  $( '.checkboxes' ).attr('checked', $(this).is(':checked'));
		  
	  });
	  
	  
  });
  </script>
 </head>
 <body>
  <div class="panel panel-primary">
 <div class="panel-heading">Odyometri<a class="btn btn-success btn-sm float-right" href="http://localhost:1000/odyometri/form.php" role="button">Add</a></div>
 <div class="panel-body">
<ul class="list-group list-group-horizontal">

<div class="container">
  
  <p>Odyometrilerin Listesi</p>
  <form>
  <div class="list-group">
  <div class="checkbox list-group-item">
      <label><input type="checkbox" value="" id="checker" >Hepsini Sec</label>
	  
	<?php 
  if(empty($_GET["sort"]) || $_GET["sort"]==''){
  echo '<a class="btn btn-warning float-right" href="http://localhost:1000/odyometri/list.php?sort=asc" role="button">Sort</a>';  
  }
  else if($_GET["sort"]=="asc"){
  echo '<a class="btn btn-warning float-right" href="http://localhost:1000/odyometri/list.php?sort=desc" role="button">Sort</a>';
  }
  else {
	echo '<a class="btn btn-warning float-right" href="http://localhost:1000/odyometri/list.php?sort=asc" role="button">Sort</a>';  
  }
  ?>
  
  </div>
    <?php 
	
	    if ($result->num_rows > 0) {
			
		while($row = $result->fetch_assoc()) {
			echo '<div class="checkbox list-group-item">
			<label><input type="checkbox" value="'.$row["ID"].'" class="checkboxes">';
			echo "Odyometri (".$row["tarih"]." )";
			echo '</label>';
			echo '<div class="dropdown float-right">';
			echo '<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Actions
			<span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
			echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="http://localhost:1000/odyometri/delete.php?id='.$row["ID"].'">Delete</a></li>';
			echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">----</a></li>     
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">----</a></li>
			</ul>
			</div>';
			echo '<a class="btn btn-primary float-right" href="http://localhost:1000/odyometri/edit.php?id='.$row["ID"].'" role="button">Edit</a>';
						
			echo '<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
			  Data
			</button>';

			
			echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Odyometri</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
				  <div class="form-group">
                
					<div class="input-group date" id="datetimepicker1">
                   
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar">'.$row["tarih"].'</span>
						</span>
					</div>';
		
		
		
	echo '</div>';		
	
	
	echo '<div class="form-group">
  <label for="comment">Kanaat</label>
  <textarea class="form-control" rows="5" id="comment" name="kanaat" >'.$row["kanaat"].'</textarea>
  
  <span class="help-block">0-255</span>
</div> 


  <div class="form-group">
  <h2>Sonuc	</h2>
         
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
      <tr>
        <td>Sol Kulak</td>
        <td><input type="text" class="form-control" id="data1" name="data1" value="'.$row["ikiyuzelli"].'"></td>
       <td><input type="text" class="form-control" id="data2" name="data2" value="'.$row["besyuz"].'"></td>
	   <td><input type="text" class="form-control" id="data3" name="data3" value="'.$row["bir"].'"></td>
	   <td><input type="text" class="form-control" id="data4" name="data4" value="'.$row["iki"].'"></td>
	   <td><input type="text" class="form-control" id="data5" name="data5" value="'.$row["uc"].'"></td>
	   <td><input type="text" class="form-control" id="data6" name="data6" value="'.$row["dort"].'"></td>
	   <td><input type="text" class="form-control" id="data7" name="data7" value="'.$row["alti"].'"></td>
	   <td><input type="text" class="form-control" id="data8" name="data8" value="'.$row["sekiz"].'"></td>
	   <td><span class="label label-info" id="sso1" name="sso1">'.$row["SSO"].'</span></td>
      </tr>
      <tr>
        <td>Sag Kulak</td>
       <td><input type="text" class="form-control" id="data10" name="data10" value="'.$row["ikiyuzelli"].'"></td>
       <td><input type="text" class="form-control" id="data11" name="data11" value="'.$row["besyuz"].'"></td>
	   <td><input type="text" class="form-control" id="data12" name="data12" value="'.$row["bir"].'"></td>
	   <td><input type="text" class="form-control" id="data13" name="data13" value="'.$row["iki"].'"></td>
	   <td><input type="text" class="form-control" id="data14" name="data14" value="'.$row["uc"].'"></td>
	   <td><input type="text" class="form-control" id="data15" name="data15" value="'.$row["dort"].'"></td>
	   <td><input type="text" class="form-control" id="data16" name="data16" value="'.$row["alti"].'"></td>
	   <td><input type="text" class="form-control" id="data17" name="data17" value="'.$row["sekiz"].'"></td>
	    <td><span class="label label-info" id="sso2" name="sso2">'.$row["SSO"].'</span></td>
      </tr>
      
    </tbody>
  </table>
  </div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				  </div>
				</div>
			  </div>
			</div>';
			echo '</div>';
		}
					
			$conn->close();
		} else {
			$conn->close();
			echo "<script type='text/javascript'> 
			alert('Kayýt yok!');
			window.location='http://localhost:1000/odyometri/add.php';
			</script>";
				
		}
			//$conn->close();
   ?>

   
	
	
	
	</div>
	</div>
	</div>
    </form>
</div>	

</ul>
</body>
</html>