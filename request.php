<?php

include 'session.php';

$conn = $connect->open();
$return = $_SERVER['HTTP_REFERER'];

if (isset($_POST['getDepartment'])) {
    $getDepartment= $_POST['getDepartment'];

    $sql = $conn->prepare("SELECT * FROM department WHERE facID=:id");
    $sql->execute(['id' => $getDepartment]);
    $results = $sql->fetchAll();

    echo json_encode($results);
}

if(isset($_POST['register'])){

    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender =$_POST['gender'];
    $department =$_POST['department'];
    $idNo=$_POST['id'];
    $no = substr(date('Y'),2,2).substr($idNo,2,4).substr(rand(),0,3);


    $sql = $conn->prepare("SELECT * FROM admin WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM stuff WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM student WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }


        try {

            if($_POST['userRegister'] =='student'){
                $query = $conn->prepare("INSERT INTO student (studentNumber,first_name,last_name,gender,department, email,id_number,status, password) 
            VALUES (:studentNumber,:first_name,:last_name, :gender,:department,:email,:id_number,:status,:password)");
                $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'department' => $department, 'email' => $email,'id_number' => $idNo,'status'=>0, 'password' => $password,'studentNumber'=>$no]);

            }else{
                $query = $conn->prepare("INSERT INTO stuff (stuffNumber,first_name,last_name,gender, email,id_number,status, password) 
            VALUES (:stuffNumber,:first_name,:last_name, :gender,:email,:id_number,:status,:password)");
                $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender, 'email' => $email,'id_number' => $idNo,'status'=>0, 'password' => $password, 'stuffNumber'=>$no]);

            }

            $_SESSION['success'] = 'User successfully registered';
            header('location: login.php');

        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header('location: '.$return);
        }

}

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    try{

        $sql = $conn->prepare("SELECT * FROM admin WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $results = $sql->fetch();

        if($sql->rowCount() > 0){
            if($password == $results['password']){
                $_SESSION['user'] = 'admin';
                $_SESSION['name'] = $results['name'];
                $_SESSION['id'] = $results['id'];
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $results['email'];
                header('location: admin/home.php');
                exit(0);
            }
            else{
                $_SESSION['error'] = 'Incorrect Password...';
                header('location: '.$return);
                exit(0);
            }
        }

        $sql = $conn->prepare("SELECT * FROM stuff WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $results = $sql->fetch();

        if($sql->rowCount()  > 0){
            if($password == $results['password']){
                $_SESSION['user'] = 'stuff';
                $_SESSION['image'] = $results['image'];
                $_SESSION['name'] = $results['first_name'].' '.$results['last_name'];
                $_SESSION['id'] = $results['stuffNumber'];
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $results['email'];
                header('location: stuff/home.php');
                exit(0);
            }
            else{
                $_SESSION['error'] = 'Incorrect Password...';
                header('location: '.$return);
                exit(0);
            }
        }

        $sql = $conn->prepare("SELECT * FROM student,status WHERE email = :email AND status.id=student.status");
        $sql->execute(['email'=>$email]);
        $results = $sql->fetch();

        if($sql->rowCount() > 0){
            if($password == $results['password']){
                $_SESSION['user'] = 'student';
                $_SESSION['image'] = $results['image'];
                $_SESSION['name'] = $results['first_name'].' '.$results['last_name'];
                $_SESSION['id'] = $results['studentNumber'];
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $results['email'];
                $_SESSION["status"] = $results['name'];

                header('location: student/home.php');
                exit(0);
            }
            else{
                $_SESSION['error'] = 'Incorrect Password...';
                header('location: '.$return);
                exit(0);
            }
        }
        else{
            $_SESSION['error'] = 'Email Does Not Exist...';
            header('location: '.$return);
        }
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }


}

$connect->close();
?>
