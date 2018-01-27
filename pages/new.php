<?php 

require('dbconnect.php');

if (isset($_POST['update'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$ing=$_POST['ing'];
						$update = mysqli_query($con,"INSERT INTO foods VALUES(null,'$name','$price','$ing')");
						if ($update) {
							echo "food items added ";
						}
					}

if (isset($_POST['update2'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysqli_query($con,"INSERT INTO grocery VALUES('$name','$price')");
						if ($update) {
							echo "food items added ";
						}
					}

if (isset($_POST['update3'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysqli_query($con,"INSERT INTO furniture VALUES('$name','$price')");
						if ($update) {
							echo "food items added ";
						}
					}

if (isset($_POST['update4'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysqli_query($con,"INSERT INTO utensils VALUES('$name','$price')");
						if ($update) {
							echo "food items added ";
						}
					}

if (isset($_POST['update5'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysqli_query($con,"INSERT INTO electronics VALUES('$name','$price')");
						if ($update) {
							echo "food items added ";
						}
					}

if (isset($_POST['update6'])) {
						$name = $_POST['name'];
						$price = $_POST['price'];
						$update = mysqli_query($con,"INSERT INTO offerss VALUES('$name','$price')");
						if ($update) {
							echo "offer items added ";
						}
					}

if (isset($_POST['update7'])) {
						$title = $_POST['title'];
						$description = $_POST['descrption'];
						$update = mysqli_query($con,"INSERT INTO events VALUES('$title','$description')");
						if ($update) {
							echo "event update added ";
						}
					}


?>
<html>
<head>
	
	
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/jquery2.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
<title>Mathai Shopping App</title>
</head>
<body bgcolor="#F5F5DC">
	
	
				
<div class="container-fluid">
	
<h4 align="center">Store Database</h4>
  <div class="row">
    <div class="col-sm-6">
    	<div class="panel panel-default">
  <div class="panel-heading"><h4>Food Items</h4></div>
  <div class="panel-body">
    	<form role="form" method="post" action="new.php">
    	<div class="form-group">
    <label for="pwd">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>


  
  <div class="form-group">
    <label for="details">Price</label>
    <input type="text" name="price" class="form-control" id="price">
  </div>


  <div class="form-group">
    <label for="pwd">Food ingredients</label>
    <input type="text"  cols="40" rows="5" name="ing" class="form-control" id="ing">
  </div>
  


  <button type="submit"  name="update" class="btn btn-primary">Add Item</button>
</form>
 </div>
 </div>
    </div>
    
    <div class="col-sm-6">
    	<div class="panel panel-default">
  <div class="panel-heading"><h4>Food Items in Store</h4></div>
  <div class="panel-body">			
  	
	<?php		
$result=mysqli_query($con,"SELECT * from foods ");
     echo "<table class='table table-hover'><tr><th>Name</th><th>Price</th><th>Ingredients</th></tr>";
	for($i=1;$i<=100;$i++)
	{
					while($row=mysqli_fetch_array($result))
  {
            echo "<tr><td>".$row['name']."</td><td>".$row['price']."</td><td>".$row['contents']."</td> </tr>";
        
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
			
		</div>
</body>
</html>
