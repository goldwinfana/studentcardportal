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
            $filename = $_FILES['edit-image']['tmp_name'];
            $sql = $query->prepare("UPDATE stuff SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,gender=:gender,image=:image,password=:password
                                         WHERE stuffNumber=:stuffNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'image'=>$filename,
                'password'=>$password,'stuffNumber'=>$id]);
            $_SESSION['success'] = 'Stuff updated successfully';
            $_SESSION['image'] = $filename;
            if(!empty($_FILES['edit-image']))
            {
                $path = "uploads/";
                $path = $path . basename( $_FILES['edit-image']['name']);

                if(move_uploaded_file($_FILES['edit-image']['tmp_name'], $path)) {
                    echo "The file ".  basename( $_FILES['edit-image']['name']).
                        " has been uploaded";
                } else{
                    echo "There was an error uploading the file, please try again!";
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
