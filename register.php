<?php include 'session.php';
if(isset($_SESSION['logged'])){
    if($_SESSION['user'] =='admin'){
        header('location: admin/home.php');
    }
    else if($_SESSION['user'] =='student'){
        header('location: student/home.php');
    }else{
        header('location: stuff/home.php');
    }
}?>
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class=" flex-width">
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
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form action="request.php" method="post" onsubmit="return submitForm()">
                        <fieldset>
                            <div class="form-group">
                                <select class="form-control" name="userRegister" required>
                                    <option value="" selected disabled>Select account</option>
                                    <option value="stuff">Stuff</option>
                                    <option value="student">Student</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="First Name" minlength="2" name="first-name" type="text" onkeypress="return /[a-z]/i.test(event.key)" required>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Last Name" minlength="2" name="last-name" type="text"  onkeypress="return /[a-z]/i.test(event.key)" required>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" onkeyup="checkEmail()" required autofocus>
                                <label id="val-email"></label>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="ID Number" name="id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID()" required>
                                <label id="val-id"></label>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="gender" required>
                                    <option value="" selected disabled>Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="department" onchange="getFaculty()" required>
                                    <option value="" selected disabled>Select department</option>
                                    <?php

                                    $conn = $connect->open();
                                    $sql = $conn->prepare("SELECT * FROM department");
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

                            <div class="form-group">
                                <select class="form-control" name="faculty" required>
                                    <option value="" selected disabled>Select faculty</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" minlength="8" type="password" onkeyup="checkPassword()" required>
                                <label id="val-password"></label>
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Confirm Password" name="confirm-password" minlength="8" type="password" onkeyup="checkMatch()" required>
                                <label id="val-confirm-password"></label>
                            </div>


                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block" name="register">Register</button>
                        </fieldset>
                    </form>
                    <a href="login.php" class="col-lg-8" style="padding: 10px">Login</a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/main.js"></script>

</body>

</html>
