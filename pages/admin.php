<?php 

include 'dbconnect.php';

if (isset($_POST['update'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysql_query("INSERT INTO food VALUES('$name','$price')");
						if ($update) {
							echo "food items added ";
						}
					}





?>
<html>
<head>
	
	
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
<title>mathai shopping</title>
</head>
<body>
	
<!--			<?php
				require 'header.php';
				?>
-->
<div class="container-fluid">
	<h4><a href="cordinator_portal.php">Back</a></h4>
<h4 align="center">food stock</h4>
  <div class="row">
    <div class="col-sm-6">
    	<div class="panel panel-default">
  <div class="panel-heading"><h4>food stuffs</h4></div>
  <div class="panel-body">
    	<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    	<div class="form-group">
    <label for="pwd">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  
  
  <div class="form-group">
    <label for="details">price</label>
    <input type="number" name="price" class="form-control" id="price">
  </div>
  
  <button type="submit"  name="update" class="btn btn-primary">Add</button>
</form>
 </div>
 </div>
    </div>
    
    <div class="col-sm-6">
    	<div class="panel panel-default">
  <div class="panel-heading"><h4>food in the store</h4></div>
  <div class="panel-body">			
	<?php		
$result=mysql_query("SELECT * from schedule ");
     echo "<table class='table table-hover'><tr><th>Name</th><th>Price</th></tr>";
	for($i=1;$i<=100;$i++){
						while($row=mysql_fetch_assoc($result))
  {
            echo "<tr><td>".$row['name']."</td><td>".$row['price']."</td></tr>";
        
          }
          echo "</table>";
        }
 ?>
 </div>
 </div>
    </div>
  </div>
</div>
<hr />
			<div class="panel-footer" style="text-align: center">
			footer
		</div>
</body>
</html>