
<div class="modal fade" id="edit-profile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header navbar-default">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Profile</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="sql.php" enctype="multipart/form-data"  onsubmit="return submitForm()">
                    <div class="form-group">
                        <input class="form-control" placeholder="First Name" minlength="2" name="edit-first-name" type="text" onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Last Name" minlength="2" name="edit-last-name" type="text"  onkeypress="return /[a-z]/i.test(event.key)" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="edit-email" type="email" onkeyup="checkEmail()" required autofocus>
                        <label id="val-email"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="ID Number" name="edit-id" minlength="13" maxlength="13" type="text" onkeypress="return /[0-9]/i.test(event.key)" onkeyup="checkID()" required>
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
                        <input class="form-control" placeholder="Password" name="edit-password" minlength="8" type="password" onkeyup="checkPassword()" required>
                        <label id="val-password"></label>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Confirm Password" name="edit-confirm-password" minlength="8" type="password" onkeyup="checkMatch()" required>
                        <label id="val-confirm-password"></label>
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

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
                    <table>
                        <tr>
                            <td>Student Number</td>
                            <td class="student-sNumber"></td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td class="student-first"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td class="student-last"></td>
                        </tr>
                        <tr>
                            <td>E-Mail Address</td>
                            <td class="student-email"></td>
                        </tr>
                        <tr>
                            <td>ID Number</td>
                            <td class="student-id"></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td class="student-age"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td class="student-gender"></td>
                        </tr>

                        <tr>
                            <td>Profile Status</td>
                            <td class="student-status"></td>
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
</div>
</div>



<script>


    function checkEmail() {

        var count =0;
        let email = $('input[name=edit-email]').val();
        let dotpos = email.indexOf(".");
        let afterDot = email.substr(dotpos,email.length -1);
        var iChar = ".";

        for (var i = 0; i < email.length; i++) {
            if (iChar.indexOf(email.charAt(i)) != -1) {
                count= count+1;
            }
        }

        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
            if(count > 2 || count ==0){
                $('#val-email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#val-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#val-email').css('color','orange').html('<span>Invalid email</span>');
                }
            }

        }else{
            $('#val-email').css('color','orange').html('<span>Invalid email</span>');
        }
    }

    function checkID() {

        let id = $('input[name=edit-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#val-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#val-id').css('color','green').html('<span>Valid ID</span>');
        }else{
            $('#val-id').css('color','orange').html('<span>Invalid ID</span>');
        }
    }

    function checkPassword() {

        let password = $('input[name=edit-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }else{
                $('#val-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#val-password').html('');
        }
    }

    function checkMatch(){
        let password = $('input[name=edit-password]').val();
        let password_confirm = $('input[name=edit-confirm-password]').val();

        if (password_confirm.length === 0) {
            $('#val-confirm-password').html('');
            return;
        }

        if (password === password_confirm) {
            $('#val-confirm-password').css('color','green').html('Match');
            return;
        }
        else {
            $('#val-confirm-password').css('color','orange').html('No Match');
            return;
        }
    }

    function submitForm(){

        if($('#val-confirm-password').css('color') =='orange'){
            $('input[name=edit-confirm-password]').focus();
            return false;
        }
        if($('input[name=edit-password]').val() !== $('input[name=edit-confirm-password]').val()){
            $('#val-confirm-password').css('color','orange').html('No Match');
            $('input[name=edit-confirm-password]').focus();
            return false;
        }
        if($('#val-email').css('color') =='orange'){
            $('input[name=edit-email]').focus();
            return false;
        }
        if($('#val-password').css('color') =='orange'){
            $('input[name=edit-password]').focus();
            return false;
        }
        if($('#val-id').css('color') =='orange'){
            $('input[name=edit-id]').focus();
            return false;
        }
        return true;

    }


    $(function() {
        $('.edit-profile').on('click', function () {
            $.ajax({
                type: 'POST',
                url: './query.php',
                data: {
                    getStudent: 2
                },
                dataType: 'json',
                success: function (response) {

                    $('input[name=edit-first-name]').val(response.first_name);
                    $('input[name=edit-last-name]').val(response.last_name);
                    $('input[name=edit-email]').val(response.email);
                    $('input[name=edit-id]').val(response.id_number);
                    $('select[name=edit-gender]').val(response.gender);
                    $('input[name=edit-password]').val(response.password);

                }});
            $('#edit-profile').modal('show');
        });


        $('.view-profile').on('click', function (){

            $.ajax({
                type: 'POST',
                url: './query.php',
                data: {
                    getStudent: 5
                },
                dataType: 'json',
                success: function (response) {

                    var year = new Date();
                    var age=response.id_number;
                    age = age.substr(0,2);
                    age = parseInt(age) > 50? "19"+age:"20"+age;
                    age = year.getFullYear()- parseInt(age);
                    $('.student-first').html(response.first_name);
                    $('.student-last').html(response.last_name);
                    $('.student-email').html(response.email);
                    $('.student-id').html(response.id_number);
                    $('.student-gender').html(response.gender);
                    $('.student-age').html(age);
                    $('.student-sNumber').html(response.studentNumber);
                    $('.student-status').html(response.name);

                }});


            $('#view-profile').modal('show');
        });

        $('.view-picture').on('click', function () {

            $('#view-picture').modal('show');
        });


    });
</script>
