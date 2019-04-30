<?php ?>

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
  

 <form action="/odyometri/add.php" method="post" name="formValues" >
 
   
 <div class="form-group">
                
	<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="dateData" required />
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
  <textarea class="form-control" rows="5" id="comment" name="kanaat" ></textarea>
  
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
        <td><input type="text" class="form-control" id="data1" name="data1"></td>
       <td><input type="text" class="form-control" id="data2" name="data2"></td>
	   <td><input type="text" class="form-control" id="data3" name="data3"></td>
	   <td><input type="text" class="form-control" id="data4" name="data4"></td>
	   <td><input type="text" class="form-control" id="data5" name="data5"></td>
	   <td><input type="text" class="form-control" id="data6" name="data6"></td>
	   <td><input type="text" class="form-control" id="data7" name="data7"></td>
	   <td><input type="text" class="form-control" id="data8" name="data8"></td>
	   <td><span class="label label-info" id="sso1" name="sso1">1</span></td>
      </tr>
      <tr>
        <td>Sag Kulak</td>
       <td><input type="text" class="form-control" id="data10" name="data10"></td>
       <td><input type="text" class="form-control" id="data11" name="data11"></td>
	   <td><input type="text" class="form-control" id="data12" name="data12"></td>
	   <td><input type="text" class="form-control" id="data13" name="data13"></td>
	   <td><input type="text" class="form-control" id="data14" name="data14"></td>
	   <td><input type="text" class="form-control" id="data15" name="data15"></td>
	   <td><input type="text" class="form-control" id="data16" name="data16"></td>
	   <td><input type="text" class="form-control" id="data17" name="data17"></td>
	    <td><span class="label label-info" id="sso2" name="sso2">2</span></td>
      </tr>
      
    </tbody>
  </table>
  </div>
  <div class="panel-body">
   <button type="button" class="btn btn-default float-left"><a href="http://localhost:1000/odyometri/list.php">iptal</a></button>
   <button type="submit" class="btn btn-primary float-right">kaydet</button>
</div>
   </form> 

</div>
</div>
 </body>
 </html>