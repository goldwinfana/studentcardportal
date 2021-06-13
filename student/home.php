<?php include '../session.php';
if(isset($_SESSION['logged'])){
    if($_SESSION['user'] =='admin'){
        header('location: ../admin/home.php');
    }
    else if($_SESSION['user'] =='stuff'){
        header('location: ../stuff/home.php');
    }
}else{
    header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Card Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">-->
<!--                <span class="sr-only">Toggle navigation</span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
            <a class="navbar-brand" href="#"><img src="../img/logo.png" width="200"></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="<?php echo ($_SESSION['status']); ?>">(<?php echo strtoupper($_SESSION['status']); ?>)</li>
            <li><?php echo ($_SESSION['name']); ?></li>
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a class="view-profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>

                    <li class="divider"></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>

    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
        <div class="session-msg">
            <?php
            if(isset($_SESSION['error'])){
                echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                unset($_SESSION['success']);
            }
            ?>
        </div>

        <div class="row timeTable">
        <div class="card-body">

                <div style="width: 60%">
                    <img src="../img/tut-logo.png" width="225">
                    <p><b>Student - <?php echo date('Y')?></b></p>
                    <p><?php echo strtoupper($_SESSION['name']); ?></p>
                    <p><?php echo $_SESSION['id']?></p>
                    <p>SOUTH CAMPUS</p>
                    <p>|||| |||||| ||||| ||||||||||| ||||||||</p>
                </div>
                <a href="#" class="view-picture" style="width: 35%;padding: 25px 0px;text-align: center;text-decoration: none">
                    <img src="<?php if(!empty($_SESSION["image"])){echo "uploads/".$_SESSION["image"];}else{echo "../img/profile.png";} ?> " width="150">
                    <p style="padding: 10px 0px;font-size: x-small"><?php echo strtoupper(substr($_SESSION['name'],0,1).'. '.substr($_SESSION['name'],strpos($_SESSION['name'],' '))); ?></p>
                </a>
            </div>
            <div class="col-lg-8" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-calendar"></i>   Time table
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>

                            <?php

                            $conn = $connect->open();
                            $sql = $conn->prepare("SELECT *,faculty.name AS facName,department.name AS depName FROM timetable,department,faculty,student 
                                                            WHERE timetable.departmentID=department.id 
                                                            AND timetable.departmentID=department.id AND student.department=department.id AND student.studentNumber=:id");
                            $sql->execute(['id'=>$_SESSION['id']]);
                            $datas = $sql->fetchAll();
                            if($sql->rowCount() > 0){
                                echo '
                                        <table id="time-table">
                                        <thead>
                                        <tr>
                                            <th>Faculty</th>
                                            <th>Course</th>
                                            <th>Module</th>
                                            <th>Venue</th>
                                             <th>Date</th>
                                        </tr>
                                        </thead><tbody>';
                                foreach ($datas as $data){
                                    echo '
                                    <tr>
                                    <td>'.$data["facName"].'</td>
                                        <td>'.$data["depName"].'</td>
                                        <td>'.$data["subjectCode"].'</td>
                                        <td>'.$data["venue"].'</td>
                                        <td>'.str_replace('T',' @ ',$data["date"]).'</td>
                                    </tr>
                                        ';
                                }
                                echo '</tbody></table>';
                            }else{
                                echo 'No data found!';
                            }

                            ?>


                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>

        </div>

        <div class="row">

            <!--            <div class="col-lg-3 col-md-6">-->
            <!--                <div class="panel panel-green">-->
            <!--                    <div class="panel-heading">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-tasks fa-5x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <div class="huge">12</div>-->
            <!--                                <div>New Tasks!</div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <a href="#">-->
            <!--                        <div class="panel-footer">-->
            <!--                            <span class="pull-left">View Details</span>-->
            <!--                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
            <!--                            <div class="clearfix"></div>-->
            <!--                        </div>-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--            </div>-->

            <div class="col-lg-8" style="width: 100%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-volume-up"></i>   Announcements
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div>

                            <?php

                            $conn = $connect->open();
                            $sql = $conn->prepare("SELECT * FROM announcement");
                            $sql->execute();
                            $datas = $sql->fetchAll();
                            if($sql->rowCount() > 0){
                                    echo '
                                        <table>
                                        <tr>
                                            <th>Date</th>
                                            <th>News Event</th>
                                        </tr>';
                                foreach ($datas as $data){
                                    echo '
                                    <tr>
                                        <td>'.$data["date"].'</td>
                                        <td>'.$data["news"].'</td>
                                    </tr>
                                        ';
                                }
                                echo '</table>';
                            }else{
                                echo 'No data found!';
                            }

                            ?>


                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-4 -->
        </div>

        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/sb-admin-2.js"></script>
<!--<script src="../js/ajax.js"></script>-->


<script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('#time-table').DataTable();
    });
</script>

</body>

</html>

<?php include('modal.php') ?>
