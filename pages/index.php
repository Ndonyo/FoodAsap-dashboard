<?php include('header.php'); ?>

<?php
include('dbconnect.php');
$sql="SELECT * FROM `slsts` where `status` ='PENDING'";
$r = mysqli_query($con,$sql);
$countcurrent = mysqli_num_rows($r);

$sql="SELECT * FROM `foods`";
$r = mysqli_query($con,$sql);
$countfoods = mysqli_num_rows($r);



?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Food Asap</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->










    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Most Recent orders
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>User</th>
                                <th>Items</th>
                                <th>Total Price</th>
                                <th>Location</th>
                                <th>Date/ TIme ordered</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php
                                    //UPDATE `slsts` SET `tprice`=[value-1],`date`=[value-2],`trxID`=[value-3],`uID`=[value-4],`contents`=[value-5],`status`=[value-6],`time`=[value-7] WHERE 1
                            include('dbconnect.php');
                            $id=0;
                            $sql="SELECT * FROM `slsts`";
                            $r2 = mysqli_query($con1,$sql);
                            while($row2 = mysqli_fetch_array($r2))
                            {
                                ?>
                                <tr class="gradeU">
                                    <?php



                                echo '<td>'.$id.'</td>';
                                echo '<td>'.$row2['uID'].'</td>';
                                echo '<td>'.$row2['contents'].'</td>';
                                echo '<td>'.$row2['tprice'].'</td>';
                                 echo '<td>'.$row2['location'].'</td>';
                                echo '<td>'.$row2['time'].'</td>';
                            $id=$id+1;

                                ?>
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







    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include('footer.php');?>
