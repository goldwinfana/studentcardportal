<?php
include '../session.php';
$query = $connect->open();
$return = $_SERVER['HTTP_REFERER'];

if (isset($_POST['getStudent'])) {
    $studentNumber = $_SESSION['id'];

    $sql = $query->prepare("SELECT *,faculty.name AS facName,department.name AS depName FROM student,status,department,faculty 
                                    WHERE studentNumber=:studentNumber AND status.id = student.status AND faculty.depID=department.id 
                                    AND faculty.id = student.faculty");
    $sql->execute(['studentNumber' => $studentNumber]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit-student'])) {
    $id = $_SESSION['id'];
    $fname = $_POST['edit-first-name'];
    $lname = $_POST['edit-last-name'];
    $email = $_POST['edit-email'];
    $id_number = $_POST['edit-id'];
    $gender = $_POST['edit-gender'];
    $password= $_POST['edit-password'];


    $sql = $query->prepare("SELECT * FROM admin WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $query->prepare("SELECT * FROM stuff WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $query->prepare("SELECT * FROM student WHERE email =:email AND studentNumber<>:studentNumber");
    $sql->execute(['email'=>$email,'studentNumber'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }


    if(isset($_FILES['edit-image']['name'])){
        $currentDirectory = getcwd();
        $uploadDirectory = "/uploads/";
        $fileName = $_FILES['edit-image']['name'];
        $fileTmpName  = $_FILES['edit-image']['tmp_name'];
        $fileExtensionsAllowed = ['jpeg','jpg','png'];
        $fileExtension = strtolower(end(explode('.',$fileName)));
        if (! in_array($fileExtension,$fileExtensionsAllowed)) {
            $_SESSION['error'] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            header('Location: '.$return);
            exit(0);
        }


        $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
    }else{
        $fileName ='';
    }

    //$fileSize = $_FILES['the_file']['size'];
//    if ($fileSize > 4000000) {
//        $errors[] = "File exceeds maximum size (4MB)";
//    }


    $sql = $query->prepare("SELECT * FROM student WHERE studentNumber=:studentNumber ");
    $sql->execute(['studentNumber' => $id]);

    if ($sql->rowCount() ==0) {
        $_SESSION['error'] = 'Student does not exit';
    } else {

        try{
            $sql = $query->prepare("UPDATE student SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,gender=:gender,image=:image,password=:password
                                         WHERE studentNumber=:studentNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'image'=>$fileName,
                'password'=>$password,'studentNumber'=>$id]);
            $_SESSION['success'] = 'Student updated successfully';
            $_SESSION['image'] = $fileName;
            if(isset($_FILES['edit-image']['name'])) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                if ($didUpload) {
                    $_SESSION['image'] = $fileName;
                } else {
                    $_SESSION['error'] = 'Image could not be uploaded';
                }
            }

        }catch (Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

    }
    header('Location: '.$return);
}


$connect->close();

?>
