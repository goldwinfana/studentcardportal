<?php
include '../session.php';
$query = $connect->open();
$return = $_SERVER['HTTP_REFERER'];

if(isset($_POST['new-user'])) {

    $email = $_POST['email'];
    $idNo = $_POST['id'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $stuNo=date('Y').substr($idNo,2,4).substr(rand(),0,2);

    $sql = $query->prepare("SELECT * FROM admin WHERE email =:email OR id_number=:id");
    $sql->execute(['email'=>$email,'id'=>$idNo]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email/Identity Number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $query->prepare("SELECT * FROM stuff WHERE email =:email OR id_number=:id");
    $sql->execute(['email'=>$email,'id'=>$idNo]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email/Identity Number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $query->prepare("SELECT * FROM student WHERE email =:email OR id_number=:id");
    $sql->execute(['email'=>$email,'id'=>$idNo]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email/Identity Number already exits';
        header('location: '.$return);
        exit(0);
    }

    if(isset($_POST['add-admin'])){
        $name = $_POST['name'];
        $sql = $query->prepare("INSERT INTO admin(name, email,id_number,gender, password) 
                VALUES (:name,:email,:id_number,:gender, :password)");
        $sql->execute(['name'=>$name, 'email'=>$email,'id_number'=>$idNo,'gender'=>$gender, 'password'=>$password]);
        $_SESSION['success'] = 'Admin added successfully';
    }
    if(isset($_POST['add-stuff'])){
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $sql = $query->prepare("INSERT INTO stuff(stuffNumber,first_name,last_name, email,id_number,gender,status, password) 
                VALUES (:stuffNumber,:first_name,:last_name,:email,:id_number,:gender,:status, :password)");
        $sql->execute(['stuffNumber'=>$stuNo,'first_name'=>$fname,'last_name'=>$lname, 'email'=>$email,'id_number'=>$idNo,'gender'=>$gender,'status'=>0, 'password'=>$password]);
        $_SESSION['success'] = 'Stuff added successfully';
    }
    if(isset($_POST['add-student'])){
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $sql = $query->prepare("INSERT INTO student(studentNumber,first_name,last_name, email,id_number,gender,status, password) 
                VALUES (:studentNumber,:first_name,:last_name,:email,:id_number,:gender,:status, :password)");
        $sql->execute(['studentNumber'=>$stuNo,'first_name'=>$fname,'last_name'=>$lname, 'email'=>$email,'id_number'=>$idNo,'gender'=>$gender,'status'=>0, 'password'=>$password]);
        $_SESSION['success'] = 'Student added successfully';
    }

    header('Location: '.$return);

}

if(isset($_POST['add-department'])){
    $department = $_POST['add-department'];
    $sql = $query->prepare("SELECT * FROM department WHERE name=:name");
    $sql->execute(['name' => $department]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Department already exist';
    }else{
        $sql = $query->prepare("INSERT INTO department(name) VALUES (:name)");
        $sql->execute(['name'=>$department]);
        $_SESSION['success'] = 'Department added successfully';
    }
    header('Location: '.$return);
}

if(isset($_POST['delete-faculty'])){
    $faculty = $_POST['delete-faculty'];

    try{
        $sql = $query->prepare("DELETE FROM faculty WHERE id=:id");
        $sql->execute(['id'=>$faculty]);

        $_SESSION['success'] = 'Faculty deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}

if(isset($_POST['edit-department'])) {
    $id = $_POST['edit-department'];
    $name = $_POST['edit-department-name'];

    try{
        $sql = $query->prepare("UPDATE department SET name=:name WHERE id=:id");
        $sql->execute(['name'=>$name,'id'=>$id]);
        $_SESSION['success'] = 'Department updated successfully';

    }catch (Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('Location: '.$return);
}

if(isset($_POST['getDepartment'])) {
    $id= $_POST['getDepartment'];

    $sql = $query->prepare("SELECT * FROM department WHERE id=:id");
    $sql->execute(['id' => $id]);
    $results = $sql->fetch();

    echo json_encode($results);
}


if(isset($_POST['add-faculty'])){
    $faculty = $_POST['add-faculty'];
    $department = $_POST['department'];
    $sql = $query->prepare("SELECT * FROM faculty WHERE name=:name AND depID=:depID");
    $sql->execute(['name' => $faculty,'depID'=>$department]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Faculty already exist';
    }else{
        $sql = $query->prepare("INSERT INTO faculty(name,depID) VALUES (:name,:depID)");
        $sql->execute(['name'=>$faculty,'depID'=>$department]);
        $_SESSION['success'] = 'Faculty added successfully';
    }
    header('Location: '.$return);
}

if(isset($_POST['delete-department'])){
    $department = $_POST['delete-department'];

    try{
        $sql = $query->prepare("DELETE FROM department WHERE id=:id");
        $sql->execute(['id'=>$department]);

        $_SESSION['success'] = 'Department deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}

if(isset($_POST['edit-faculty'])) {
    $id = $_POST['edit-faculty'];
    $name = $_POST['edit-faculty-name'];
    $department = $_POST['department'];

    try{
        $sql = $query->prepare("UPDATE faculty SET name=:name,depID=:depID WHERE id=:id");
        $sql->execute(['name'=>$name,'depID'=>$department,'id'=>$id]);
        $_SESSION['success'] = 'Faculty updated successfully';

    }catch (Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('Location: '.$return);
}

if(isset($_POST['getFaculty'])) {
    $id= $_POST['getFaculty'];

    $sql = $query->prepare("SELECT *,department.name AS depName,faculty.name AS facName
                                     FROM department,faculty WHERE faculty.depID=department.id AND faculty.id=:id");
    $sql->execute(['id' => $id]);
    $results = $sql->fetch();

    echo json_encode($results);
}



if(isset($_POST['add-timetable'])){
    $faculty = $_POST['student-faculty'];
    $department = $_POST['student-department'];
    $subject = $_POST['subject'];
    $venue= str_replace('T',' ',$_POST['venue']);
    $date =$_POST['date'];

    try {
        $sql = $query->prepare("INSERT INTO timetable(departmentID,facultyID,subjectCode,venue,date) 
                                     VALUES (:departmentID,:facultyID,:subjectCode,:venue,:date)");
        $sql->execute(['departmentID'=>$department,'facultyID'=>$faculty,'subjectCode'=>$subject,'venue'=>$venue,'date'=>$date]);
        $_SESSION['success'] = 'Subject time table created successfully';
    }catch (Exception $e){
        $_SESSION['error']=$e->getMessage();
    }

    header('Location: '.$return);
}

if(isset($_POST['announce'])){
    $news = $_POST['announce'];
    $sql = $query->prepare("INSERT INTO announcement(news) VALUES (:news)");
    $sql->execute(['news'=>$news]);
    $_SESSION['success'] = 'Announcement added successfully';
    header('Location: '.$return);
}

if(isset($_POST['delete-announce'])){
    $newsID = $_POST['delete-announce'];

    try{
        $sql = $query->prepare("DELETE FROM announcement WHERE id=:id");
        $sql->execute(['id'=>$newsID]);

        $_SESSION['success'] = 'Announcement deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}

if (isset($_POST['getAnnounce'])) {
    $id= $_POST['getAnnounce'];

    $sql = $query->prepare("SELECT * FROM announcement WHERE id=:id");
    $sql->execute(['id' => $id]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit-news'])) {
    $id = $_POST['announce-id'];
    $news = $_POST['edit-news'];

    try{
        $sql = $query->prepare("UPDATE announcement SET news=:news WHERE id=:id");
        $sql->execute(['news'=>$news,'id'=>$id]);
        $_SESSION['success'] = 'Announcement updated successfully';

    }catch (Exception $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('Location: '.$return);
}

//admin

if (isset($_POST['getAdmin'])) {
    $id = $_POST['getAdmin']== -1? $_SESSION['id'] : $_POST['getAdmin'];

    $sql = $query->prepare("SELECT * FROM admin WHERE id=:id");
    $sql->execute(['id' => $id]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit-admin'])) {
    $id = $_POST['edit-admin'];
    $name = $_POST['edit-name'];
    $email = $_POST['edit-email'];
    $id_number = $_POST['edit-id'];
    $gender = $_POST['edit-gender'];
    $status = $_POST['edit-status'];
    $password= $_POST['edit-password'];

    $sql = $query->prepare("SELECT * FROM admin WHERE email=:email AND id<>:id ");
    $sql->execute(['email' => $email,'id'=>$id]);

    if ($sql->rowCount() > 0) {
        $_SESSION['error'] = 'Email already exists';
    } else {

        try{
            $sql = $query->prepare("UPDATE admin SET name=:name, email=:email, 
                                                    id_number=:id_number,gender=:gender,password=:password
                                         WHERE id=:id");
            $sql->execute(['name'=>$name,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'password'=>$password,'id'=>$id]);
            $_SESSION['success'] = 'Admin updated successfully';
            if($_SESSION['name'] !== $name){
                $_SESSION['name'] = $name;
            }
        }catch (Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

    }
    header('Location: '.$return);
}

if(isset($_POST['delete-admin'])){
    $studentNumber = $_POST['delete-admin'];

    try{
        $sql = $query->prepare("DELETE FROM student WHERE id=:id");
        $sql->execute(['id'=>$id]);

        $_SESSION['success'] = 'Admin deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}


//student

if (isset($_POST['getStudent'])) {
    $studentNumber = $_POST['getStudent'];

    $sql = $query->prepare("SELECT *,department.name AS depName,department.id AS depID,faculty.name AS facName,faculty.id AS facID,status.id AS statName 
                                     FROM student,status,department,faculty 
                                     WHERE studentNumber=:studentNumber 
                                     AND status.id = student.status AND department.id = student.department AND faculty.id=department.facID");
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
    $department= $_POST['student-department'];

    $sql = $query->prepare("SELECT * FROM student WHERE studentNumber=:studentNumber ");
    $sql->execute(['studentNumber' => $id]);

    if ($sql->rowCount() ==0) {
        $_SESSION['error'] = 'Student does not exit';
    } else {

        try{
            $sql = $query->prepare("UPDATE student SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,status=:status,gender=:gender,department=:department,password=:password
                                         WHERE studentNumber=:studentNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number,'gender'=>$gender,'status'=>$status,
                'password'=>$password,'department'=>$department,'studentNumber'=>$id]);
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

//stuff

if (isset($_POST['getStuff'])) {
    $stuffNumber = $_POST['getStuff'];

    $sql = $query->prepare("SELECT * FROM stuff,status WHERE stuffNumber=:stuffNumber AND status.id = stuff.status");
    $sql->execute(['stuffNumber' => $stuffNumber]);
    $results = $sql->fetch();

    echo json_encode($results);
}

if(isset($_POST['edit-stuff'])) {
    $id = $_POST['edit-stuff'];
    $fname = $_POST['stuff-first-name'];
    $lname = $_POST['stuff-last-name'];
    $email = $_POST['stuff-email'];
    $id_number = $_POST['stuff-id'];
    $gender = $_POST['stuff-gender'];
    $status = $_POST['stuff-status'];
    $password= $_POST['stuff-password'];

    $sql = $query->prepare("SELECT * FROM stuff WHERE stuffNumber=:stuffNumber ");
    $sql->execute(['stuffNumber' => $id]);

    if ($sql->rowCount() ==0) {
        $_SESSION['error'] = 'Student does not exit';
    } else {

        try{
            $sql = $query->prepare("UPDATE stuff SET first_name=:first_name,last_name=:last_name, email=:email, 
                                                    id_number=:id_number,status=:status,gender=:gender,password=:password
                                         WHERE stuffNumber=:stuffNumber");
            $sql->execute(['first_name'=>$fname,'last_name'=>$lname,'email'=>$email,'id_number'=>$id_number, 'gender'=>$gender,'status'=>$status,
                'password'=>$password,'stuffNumber'=>$id]);
            $_SESSION['success'] = 'Student updated successfully';
        }catch (Exception $e){
            $_SESSION['error'] = $e->getMessage();
        }

    }
    header('Location: '.$return);
}

if(isset($_POST['delete-stuff'])){
    $stuffNumber = $_POST['delete-stuff'];

    try{
        $sql = $query->prepare("DELETE FROM stuff WHERE stuffNumber=:stuffNumber");
        $sql->execute(['stuffNumber'=>$stuffNumber]);

        $_SESSION['success'] = 'Admin deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: '.$return);

}


if (isset($_POST['profile_admin'])) {
    $id = $_SESSION['admin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    $stmt = $query->prepare("SELECT COUNT(*) AS numrows FROM admin WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $query->prepare("UPDATE admin SET email=:email, password=:password, firstName=:name,
                                         mobile=:mobile
                                         WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'name' =>
            $name, 'mobile' => $mobile,'id'=>$id]);

        $_SESSION['success'] = 'Record updated successfully';
    }
    header('location: welcome.php');
}


if (isset($_POST['edit_admins'])) {
    $id = $_POST['edit_admin'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    $stmt = $query->prepare("SELECT COUNT(*) AS numrows FROM admin WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $query->prepare("UPDATE admin SET email=:email, password=:password, name=:name,
                                         mobile=:mobile
                                         WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'name' =>
            $name, 'mobile' => $mobile,'id'=>$id]);

        $_SESSION['success'] = 'Record updated successfully';
    }
    header('location: welcome.php');
}

//if (isset($_POST['getDepartment'])) {
//    $getDepartment = $_POST['getDepartment'];
//
//    try {
//        $sql = $query->prepare("SELECT * FROM department WHERE facID=:id");
//        $sql->execute(['id' => $getDepartment]);
//        $results = $sql->fetchAll();
//    }catch (Exception $e){
//        $results = $e->getMessage();
//    }
//
//    echo json_encode($results);
//}

if (isset($_POST['getSubject'])) {
    $getDepartment= $_POST['getSubject'];

    try {
        $sql = $query->prepare("SELECT * FROM subject WHERE departmentID=:id");
        $sql->execute(['id' => $getDepartment]);
        $results = $sql->fetchAll();
    }catch (Exception $e){
        $results = $e->getMessage();
    }

    echo json_encode($results);
}

$connect->close();

?>
