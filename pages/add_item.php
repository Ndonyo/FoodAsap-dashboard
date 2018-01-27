<?php include('header.php'); ?>





<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add items</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <div class="panel-body">



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
                            <form role="form" method="post" action="add_item.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Food name</label>
                                    <input class="form-control" placeholder="Enter  name" required="" id="price1" name="price1">
                                    <p class="help-block">Item name</p>
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input class="form-control" required="" placeholder="Enter  price" id="price" name="price">
                                    <p class="help-block">Item price</p>
                                </div>


                                <select class="form-control" id="category" name="category">
                                                <option>Main meal</option>
                                                <option>Beverage</option>

                                            </select>
                                <p class="help-block">Select food category</p>
                                <br/>
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>

                                <div class="form-group">
                                    <label>Item description</label>
                                    <div class="">
                                        <textarea class="form-control ckeditor" id="editor1" name="editor1" rows="6"></textarea>
                                    </div>
                                </div>


                                <input type="submit" value="Save now!" name="submit">

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
include('dbconnect.php');
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




                        $name2 = $_POST['price1'];
                        $category=$_POST['category'];
	 					$price = $_POST['price'];
                        $editor_data = $_POST['editor1'];


    $editor_data= str_replace("\n", '', $editor_data);
    $editor_data=str_ireplace('<p>','',$editor_data);
    $editor_data=str_ireplace('</p>','',$editor_data);
    $editor_data = preg_replace('/<p\b[^>]*>(.*?)<\/p>/i', '', $editor_data);
    //INSERT INTO `foods` (`id`, `name`, `price`, `contents`, `image`) VALUES (NULL, 'qw', '50', 'text', 'me.png');
$update = mysqli_query($con,"INSERT INTO `foods` (`id`, `name`, `price`, `contents`, `image`,`category`,`quantity_remaining`,`qntytype`)
                                          VALUES (NULL, '$name2', '$price', '$editor_data', '$file_name_name', '$category',0,'')");
    //INSERT INTO `foods` (`id`, `name`, `price`, `contents`, `image`, `category`) VALUES (NULL, 's', '1', 's', 's', 's');
						if ($update) {
							 echo "<script>alert('Registration success!');</script>";
						}
    else
    {
        echo "<script>alert('an error has occured');</script>";
    }















}
?>
    <?php include('footer.php');?>
