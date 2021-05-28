<?php
include '../session.php';
$query = $connect->open();
$return = $_SERVER['HTTP_REFERER'];

if (isset($_POST['getStudent'])) {
    $studentNumber = $_SESSION['id'];

    $sql = $query->prepare("SELECT * FROM student,status WHERE studentNumber=:studentNumber AND status.id = student.status");
    $sql->execute(['studentNumber' => $studentNumber]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit-student'])) {
    $id = $_POST['edit-student'];
    $fname = $_POST['student-first-name'];
    $lname = $_POST['student-last-name'];
    $email = $_POST['student-email'];
    $id_number = $_POST['student-id'];
    $gender = $_POST['student-gender'];
    $status = $_POST['student-status'];
    $password= $_POST['student-password'];

    $sql = $query->prepare("SELECT * FROM student WHERE studentNumber=:studentNumber ");
    $sql->execute(['studentNumber' => $id]);

    if ($sql->rowCount() ==0) {
        $_SESSION['error'] = 'Student does not exit';
    } else {

        try{
            $sql = $query->prepare("UPDATE student SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,status=:status,gender=:gender,password=:password
                                         WHERE studentNumber=:studentNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'status'=>$status,
                'password'=>$password,'studentNumber'=>$id]);
            $_SESSION['success'] = 'Student updated successfully';
        }catch (Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

    }
    header('Location: '.$return);
}

if(isset($_POST['delete-student'])){
    $studentNumber = $_POST['delete-student'];

    try{
        $sql = $query->prepare("DELETE FROM student WHERE studentNumber=:studentNumber");
        $sql->execute(['studentNumber'=>$studentNumber]);

        $_SESSION['success'] = 'Student deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}


$connect->close();

?>
