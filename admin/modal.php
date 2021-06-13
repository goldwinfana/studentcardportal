<div class="modal fade" id="view-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>My Profile</b></h4>
            </div>
            <div class="modal-body" style="display: grid;">

                <div style="text-align: center"><img src="../img/profile.png" alt="..." class="img-fluid rounded-circle"></div>

                <hr/>
                <table class="table-striped table-hover -bold" style="text-align: initial">
                    <tr>
                        <td>Stuff Number</td>
                        <td class="admin-sNumber"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td class="admin-name"></td>
                    </tr>
                    <tr>
                        <td>E-Mail Address</td>
                        <td class="admin-email"></td>
                    </tr>
                    <tr>
                        <td>ID Number</td>
                        <td class="admin-id"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td class="admin-age"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="admin-gender"></td>
                    </tr>

                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-warning btn-flat edit-profile" data-dismiss="modal"><i class="fa fa-save"></i> Edit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div></div>


<div class="modal fade" id="new-announce">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Announcement</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">

                    <div class="form-group">
                        <textarea name="announce" placeholder="Type in message here..." style="height: 200px;width: 80%"></textarea>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="edit-announce">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Announcement</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">

                    <input name="announce-id" hidden>
                    <div class="form-group">
                        <textarea name="edit-news" placeholder="Type in message here..." style="height: 200px;width: 80%"></textarea>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="delete-announce">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Announcement</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-announce" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!--//admin-->
<div class="modal fade" id="edit-admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b class="ad-prof">Edit Admin</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php"  onsubmit="return submitForm()">

                    <input name="edit-admin" hidden>

                    <div class="form-group">
                        <input class="form-control" placeholder="Name" minlength="2" name="edit-name" type="text" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="edit-email" type="email" onkeyup="checkEmail('admin')" required autofocus>
                        <label id="val-email"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="ID Number" name="edit-id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID('admin')" required>
                        <label id="val-id"></label>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="edit-gender" required>
                            <option value="" selected disabled>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="edit-password" minlength="8" type="password" onkeyup="checkPassword('admin')" required>
                        <label id="val-password"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" name="edit-confirm-password" minlength="8" type="password" onkeyup="checkMatch('admin')" required>
                        <label id="val-confirm-password"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="delete-admin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Admin</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-admin" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="delete-faculty">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Faculty</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-faculty" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="edit-faculty">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Faculty</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php" enctype="multipart/form-data">

                    <input name="edit-faculty" hidden>

                    <div class="form-group">
                        <input class="form-control" placeholder="Enter faculty name" name="edit-faculty-name" type="text" required autofocus>
                        <label id="student-email"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="delete-department">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Department</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-department" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="edit-department">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Department</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php" enctype="multipart/form-data">

                    <input name="edit-department" hidden>

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
                        <input class="form-control" name="edit-department-name" placeholder="Enter department name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!--//student-->
<div class="modal fade" id="edit-student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Student</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php" enctype="multipart/form-data"  onsubmit="return submitForm()">

                    <input name="edit-student" hidden>

                    <div class="form-group">
                        <select class="form-control getDepartment" name="faculty">
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

                    <div class="form-group">
                        <select class="form-control" name="student-department" required>
                            <option value="" selected disabled>Select department</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select style="background: palegoldenrod" class="form-control" name="student-status" required>
                            <option value="" selected disabled>Select status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="First Name" minlength="2" name="student-first-name" type="text" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Last Name" minlength="2" name="student-last-name" type="text"  onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="student-email" type="email" onkeyup="checkEmail('student')" required autofocus>
                        <label id="student-email"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="ID Number" name="student-id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID('student')" required>
                        <label id="student-id"></label>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="student-gender" required>
                            <option value="" selected disabled>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="student-password" minlength="8" type="password" onkeyup="checkPassword('student')" required>
                        <label id="student-password"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" name="student-confirm-password" minlength="8" type="password" onkeyup="checkMatch('student')" required>
                        <label id="student-confirm-password"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="delete-student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Student</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-student" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!--//stuff-->
<div class="modal fade" id="edit-stuff">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Stuff</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php"  onsubmit="return submitForm()">

                    <input name="edit-stuff" hidden>
                    <div class="form-group">
                        <select style="background: palegoldenrod" class="form-control" name="stuff-status" required>
                            <option value="" selected disabled>Change status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="First Name" minlength="2" name="stuff-first-name" type="text" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Last Name" minlength="2" name="stuff-last-name" type="text"  onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="stuff-email" type="email" onkeyup="checkEmail('stuff')" required autofocus>
                        <label id="stuff-email"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="ID Number" name="stuff-id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID('stuff')" required>
                        <label id="stuff-id"></label>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="stuff-gender" required>
                            <option value="" selected disabled>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="stuff-password" minlength="8" type="password" onkeyup="checkPassword('stuff')" required>
                        <label id="stuff-password"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" name="stuff-confirm-password" minlength="8" type="password" onkeyup="checkMatch('stuff')" required>
                        <label id="stuff-confirm-password"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="delete-stuff">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Delete Stuff</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php">
                    <input name="delete-stuff" hidden>

                    <div class="form-group">
                        <label class="lbl-dlt"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b class="add-title-user"></b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="query.php"  onsubmit="return submitForm()">

                    <div class="form-group add-user-id">

                    </div>

                    <div class="form-group">
                       <input class="form-control" placeholder="Name" minlength="2" name="name" type="text" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="First Name" minlength="2" name="first-name" type="text" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Last Name" minlength="2" name="last-name" type="text" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" onkeyup="checkEmail('add')" required autofocus>
                        <label id="email"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="ID Number" name="id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID('add')" required>
                        <label id="id"></label>
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
                        <input class="form-control" placeholder="Password" name="password" minlength="8" type="password" onkeyup="checkPassword('add')" required>
                        <label id="password"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" name="confirm-password" minlength="8" type="password" onkeyup="checkMatch('add')" required>
                        <label id="confirm-password"></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" name="new-user"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
