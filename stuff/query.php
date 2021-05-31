<?php
include '../session.php';
$query = $connect->open();
$return = $_SERVER['HTTP_REFERER'];

if (isset($_POST['getStuff'])) {
    $stuffNumber = $_SESSION['id'];

    $sql = $query->prepare("SELECT * FROM stuff,status WHERE stuffNumber=:stuffNumber AND status.id = stuff.status");
    $sql->execute(['stuffNumber' => $stuffNumber]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit'])) {
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

    $sql = $query->prepare("SELECT * FROM student WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $query->prepare("SELECT * FROM stuff WHERE email =:email AND stuffNumber<>:stuffNumber");
    $sql->execute(['email'=>$email,'stuffNumber'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    if(isset($_FILES['edit-image'])){
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


    $sql = $query->prepare("SELECT * FROM stuff WHERE stuffNumber=:stuffNumber ");
    $sql->execute(['stuffNumber' => $id]);

    if ($sql->rowCount() ==0) {
        $_SESSION['error'] = 'Stuff does not exit';
    } else {

        try{
            $sql = $query->prepare("UPDATE stuff SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,gender=:gender,image=:image,password=:password
                                         WHERE stuffNumber=:stuffNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'image'=>$fileName,
                'password'=>$password,'stuffNumber'=>$id]);
            $_SESSION['success'] = 'Stuff updated successfully';
            $_SESSION['image'] = $fileName;
            if(isset($_FILES['edit-image'])) {
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
