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
      <label><input type="checkbox" value="" id="checker" >Check All</label>
	  
	<?php 
  if(empty($_GET["sort"]) || $_GET["sort"]=''){
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
			echo '</div>';
		}
					
			$conn->close();
		} else {
			$conn->close();
			echo "<script type='text/javascript'> 
			alert('Kayıt yok!');
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