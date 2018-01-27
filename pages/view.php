<?php include('header.php');?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Availabe Items
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Data</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            include('dbconnect.php');
                            $sql="SELECT * FROM `foods`";
                            $r2 = mysqli_query($con,$sql);
                            while($row2 = mysqli_fetch_array($r2))
                            {
                                ?>
                              <tr class="gradeU">
                            <?php

                             $id=$row2['id'];
                             $name=$row2['name'];
                             $price=$row2['price'];
                             $contents=$row2['contents'];
                             $image=$row2['image'];
                             $quantity_remaining = $row2['quantity_remaining'];

                                echo '<td>'.$id.'</td>';
                                echo '<td>'.$name.'</td>';
                                echo '<td>'.$price.'</td>';

                                echo '<td>'.$quantity_remaining.'</td>';
                                echo '<td>'.$contents.'</td>';

                                $path ="images/".$image;

                                ?>
                                 <td> <img src=<?php echo $path ?> alt="img" style="width:100px;height:100px;"></td>
                              </tr>
                            <?php

                            }

                            ?>



                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<script type="text/javascript">


function addRowHandlers() {
    var table = document.getElementById("dataTables-example");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row)
            {
                return function() {
                                        var cell = row.getElementsByTagName("td")[0];
                                        var id = cell.innerHTML;
                                    //    alert(id);

                    window.location.href = "edit_food.php?id="+id;

                                 };
            };

        currentRow.onclick = createClickHandler(currentRow);
    }
}
window.onload = addRowHandlers();

    </script>

<?php include('footer.php');?>
