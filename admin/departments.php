<?php include '../session.php';
if(isset($_SESSION['islogged'])){
   if($_SESSION['user'] =='student'){
        header('location: ../student/home.php');
    }else if($_SESSION['user'] =='stuff'){
        header('location: ../stuff/home.php');
    }
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

    <!-- MetisMenu CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/admin.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../img/logo.png" width="100"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><?php echo ($_SESSION['name']); ?></li>
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


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#" id="<?php echo $_SESSION['id'] ?>" class="edit-admin profile"><i class="fa fa-user-secret fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#" class="nav-users"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admins.php">Admin</a>
                                </li>
                                <li>
                                    <a href="stuff.php">Stuff</a>
                                </li>
                                <li>
                                    <a href="students.php">Student</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li><a href="faculty.php"><i class="fa fa-hospital-o fa-fw"></i> Faculty</a>
                        <li><a href="departments.php"><i class="fa fa-book fa-fw"></i> Department</a>
                        <li><a href="timetable.php"><i class="fa fa-calendar-times-o fa-fw"></i> Time Table</a>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
<!--                        <li>-->
<!--                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>-->
<!--                            <ul class="nav nav-second-level">-->
<!--                                <li>-->
<!--                                    <a href="blank.html">Blank Page</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="login.html">Login Page</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            /.nav-second-level -->
<!--                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Faculty</h1>
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

            <div class="row timetable-width">
                <form  method="post" action="query.php" style="display: inherit;width: 100%">
                    <div class="form-group" style="width: 100%;margin: 5px">
                        <select class="form-control" name="faculty" required>
                            <option value="" selected disabled>Select faculty</option>
                            <?php

                            $conn = $connect->open();
                            $sql = $conn->prepare("SELECT * FROM faculty");
                            $sql->execute();
                            $datas = $sql->fetchAll();
                            if($sql->rowCount() > 0){
                                foreach ($datas as $data){
                                    echo '<option value="'.$data["id"].'">'.$data["name"].'</option>';
                                }
                            }
                            $connect->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group" style="width: 100%;margin: 5px">
                        <input class="form-control" name="add-department" placeholder="Enter department name" required>
                    </div>
                    <button type="submit" class="form-control btn-primary" style="margin: 5px">Save</button>
                </form>
            </div>
            <div class="row">
                    <table id="_table" class="table table-bordered table table-striped table-hover" style="width: 100%;">
                        <thead>
                            <th>Faculty Name</th>
                            <th>Department Name</th>
                            <th>Action</th>

                        </thead>
                        <tbody>

                        <?php

                        $query = $connect->open();
                        $sql = $query->prepare("SELECT *,department.name AS depName,faculty.name AS facName,department.id AS depID 
                                                        from department,faculty WHERE faculty.id=department.facID");
                        $sql->execute();

                        if($sql->rowCount() > 0){
                            foreach ($sql as $data){

                                echo '
                                     <tr>
                                        <td>'.ucfirst($data["facName"]).'</td>
                                         <td>'.ucfirst($data["depName"]).'</td>
                                        <td>
                                            <div class="d-flex" >
                                                <a id="'.$data["depID"].'" class="action-btn btn-warning edit-department" for="'.$data["depName"].'" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a id="'.$data["depID"].'" class="action-btn btn-danger delete-department" for="'.$data["depName"].'" title="Delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                     </tr>
                                ';
                            }

                        }
                        $connect->close();
                        ?>

                        </tbody>
                    </table>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Data Table Initialize -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <script type="text/javascript" src="../js/dataTables.min.js"></script>
    <script type="text/javascript" src="../js/bootTables.min.js"></script>
    <script src="../js/sb-admin-2.js"></script>
    <script src="main.js"></script>
</body>

</html>
<?php include('modal.php') ?>
