<?php include('header.php'); ?>





<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add food quantity/ edit details!</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="panel-body">
        <?php
        include('dbconnect.php');


        $id=$_GET['id'];
        $id=$id*1;
       	$sql = "SELECT * FROM `foods` where `id` ='$id'";
	$r = mysqli_query($con,$sql);
    $count = mysqli_num_rows($r);
    $result = array();
    if ($count>0)
    {
 while($row = mysqli_fetch_array($r))
 {
     $name=$row['name'];
     $price=$row['price'];
     $contents=$row['contents'];
     $image=$row['image'];
     $category=$row['category'];
     $amt_remaining=$row['quantity_remaining'];
     $qntytype = $row['qntytype'];
}


    }
    else
{

}

        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Item details
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                        </div>


                        <div class="col-lg-6">
                            <form role="form" method="post" action="edit_food.php?id=<?php echo $id?>" enctype="multipart/form-data">



                                <div class="form-group">
                                    <label>Food name</label>
                                    <input class="form-control"  id="price1" name="price1" value='<?php echo $name; ?>'>
                                    <p class="help-block">Item name</p>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" value='<?php echo $price; ?>' id="price" name="price">
                                    <p class="help-block">Item price</p>
                                </div>


                                <select class="form-control" id="category" name="category">

                                    <?php

/*
<option>Main meal</option>
<option>Beverage</option>*/





                                    if($category=="Main meal")
                                    {
                                        echo " <option selected='Main meal'>Main meal</option>
                                                <option>Beverage</option>
                                              ";
                                    }
                                    else
                                        if($category=="Beverage")
                                    {
                                        echo " <option selected='Beverage'>Beverage</option>
                                                <option>Main meal</option>
                                                ";
                                    }


                                    ?>


                                            </select>
                                <p class="help-block">Select food category</p>
                                <br/>


                                 <div class="form-group">
                                    <label>Add / Edit Quantity</label>
                                    <input class="form-control"  id="qnty" name="qnty" value='<?php echo $amt_remaining; ?>'>
                                    <p class="help-block">Quantity remaining!</p>
                                </div>


                                <div class="form-group">
                                   <label>Quantity type</label>
                                   <input class="form-control"  id="qntytype" name="qntytype" value='<?php echo $qntytype; ?>'>
                                   <p class="help-block">Quantity type</p>
                               </div>


                                <div class="form-group">
                                    <label>Item description</label>
                                    <div class="">
                                        <textarea class="form-control ckeditor" id="editor1"  name="editor1" rows="6">
                                        <?php echo $contents;?>
                                        </textarea>
                                    </div>
                                </div>


                                <input type="submit" value="Save now!" name="submit">
                                <!-- <button type="button" class="btn btn-danger" action = "delete.php" >Delete food</button> -->

<?php $link = 'delete.php?id='.$id; ?>

                                <a href='<?php echo $link ?>' class="btn btn-danger" role="button">Delete food</a>


                            </form>
                        </div>

                        <div class="col-lg-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

if(isset($_POST["submit"])) {

    $filename="";
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $file_name_name = basename($_FILES["fileToUpload"]["name"]);
     $file_name_name = preg_replace('/\s+/', '', $file_name_name);
     $file_name_name = str_replace(' ', '', $file_name_name);
     $file_name_name = str_replace(" ","",$file_name_name);
    $target_file=$target_dir. $file_name_name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  //  echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error


if ($uploadOk == 0) {
  //  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $filename=basename( $_FILES["fileToUpload"]["name"]);
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        ///echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
       // echo "Sorry, there was an error uploading your file.";
    }
}



$id=$_GET['id'];
$id=$id*1;




                        $name2 = $_POST['price1'];
                        $category=$_POST['category'];
	 					            $price = $_POST['price'];
                        $qnty=$_POST['qnty'];
                        $editor_data = $_POST['editor1'];
                        $qntytype = $_POST['qntytype'];



    $editor_data= str_replace("\n", '', $editor_data);
    $editor_data=str_ireplace('<p>','',$editor_data);
    $editor_data=str_ireplace('</p>','',$editor_data);
    $editor_data = preg_replace('/<p\b[^>]*>(.*?)<\/p>/i', '', $editor_data);
    //INSERT INTO `foods` (`id`, `name`, `price`, `contents`, `image`) VALUES (NULL, 'qw', '50', 'text', 'me.png');

    if($editor_data==='')
    {
        $sql="UPDATE `foods` SET `quantity_remaining` = '$qnty', `category` ='$category', `name` ='$name2' , `price` ='$price', `qntytype` ='$qntytype'  WHERE `foods`.`id` = '$id' ;";

    }
    else
    {
        $sql="UPDATE `foods` SET `quantity_remaining` = '$qnty', `category` ='$category',`name` ='$name2' , `price` ='$price', `contents` ='$editor_data', `qntytype` ='$qntytype' WHERE `foods`.`id` = '$id' ;";
    }




$update = mysqli_query($con,$sql);

						if ($update) {
							 echo "<script>alert('Update success!');</script>";
						}
    else
    {
        echo "<script>alert('an error has occured');</script>";
    }


}
?>
    <?php include('footer.php');?>
