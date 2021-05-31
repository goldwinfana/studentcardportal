function checkEmail(n) {

    var count =0;
    if(n =='stuff'){
        let email = $('input[name=stuff-email]').val();
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
                $('#stuff-email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#stuff-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#stuff-email').css('color','orange').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#stuff-email').css('color','orange').html('<span>Invalid email</span>');
        }

    }else if(n =='student'){
        let email = $('input[name=student-email]').val();
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
                $('#student-email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#student-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#student-email').css('color','orange').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#student-email').css('color','orange').html('<span>Invalid email</span>');
        }
    }else if(n =='admin'){
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

        }
        else{
            $('#val-email').css('color','orange').html('<span>Invalid email</span>');
        }
    }else if(n =='add'){
        let email = $('input[name=email]').val();
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
                $('#email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#email').css('color','orange').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#email').css('color','orange').html('<span>Invalid email</span>');
        }
    }


}

function checkID(n) {

    if(n == 'stuff'){
        let id = $('input[name=stuff-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#stuff-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#stuff-id').css('color','green').html('<span>Valid ID</span>');
        }else{
            $('#stuff-id').css('color','orange').html('<span>Invalid ID</span>');
        }
    }else if(n == 'student'){
        let id = $('input[name=student-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#student-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#student-id').css('color','green').html('<span>Valid ID</span>');
        }else{
            $('#student-id').css('color','orange').html('<span>Invalid ID</span>');
        }
    }else if(n == 'admin'){
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
    }else if(n == 'add'){
        let id = $('input[name=id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#id').css('color','green').html('<span>Valid ID</span> ')
                : $('#id').css('color','green').html('<span>Valid ID</span>');
        }else{
            $('#id').css('color','orange').html('<span>Invalid ID</span>');
        }
    }

}

function checkPassword(n) {

    if(n == 'stuff'){
        let password = $('input[name=stuff-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#stuff-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#stuff-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#stuff-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#stuff-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#stuff-password').css('color','orange').html('Unaccepted Password');
            }else{
                $('#stuff-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#stuff-password').html('');
        }
    }else if(n == 'student'){
        let password = $('input[name=student-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#student-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#student-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#student-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#student-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#student-password').css('color','orange').html('Unaccepted Password');
            }else{
                $('#student-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#student-password').html('');
        }
    }else if(n == 'admin'){
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
    }else if(n == 'add'){
        let password = $('input[name=password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#password').css('color','orange').html('Unaccepted Password');
            }else{
                $('#password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#password').html('');
        }
    }

}

function checkMatch(n){

    if(n=='stuff'){
        let password = $('input[name=stuff-password]').val();
        let password_confirm = $('input[name=stuff-confirm-password]').val();

        if (password_confirm.length === 0) {
            $('#stuff-confirm-password').html('');
            return;
        }

        if (password === password_confirm) {
            $('#stuff-confirm-password').css('color','green').html('Match');
            return;
        }
        else {
            $('#stuff-confirm-password').css('color','orange').html('No Match');
            return;
        }
    }else if(n=='student'){
        let password = $('input[name=student-password]').val();
        let password_confirm = $('input[name=student-confirm-password]').val();

        if (password_confirm.length === 0) {
            $('#student-confirm-password').html('');
            return;
        }

        if (password === password_confirm) {
            $('#student-confirm-password').css('color','green').html('Match');
            return;
        }
        else {
            $('#student-confirm-password').css('color','orange').html('No Match');
            return;
        }
    }else if(n=='admin'){
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
    }else if(n=='add'){
        let password = $('input[name=password]').val();
        let password_confirm = $('input[name=confirm-password]').val();

        if (password_confirm.length === 0) {
            $('#confirm-password').html('');
            return;
        }

        if (password === password_confirm) {
            $('#confirm-password').css('color','green').html('Match');
            return;
        }
        else {
            $('#confirm-password').css('color','orange').html('No Match');
            return;
        }
    }

}

function submitForm(){

    if($('#stuff-confirm-password').css('color') =='orange'){
        $('input[name=stuff-confirm-password]').focus();
        return false;
    }

    if($('input[name=stuff-password]').val() !== $('input[name=stuff-confirm-password]').val()){
        $('#stuff-confirm-password').css('color','orange').html('No Match');
        $('input[name=stuff-confirm-password]').focus();
        return false;
    }
    if($('#stuff-email').css('color') =='orange'){
        $('input[name=stuff-email]').focus();
        return false;
    }
    if($('#stuff-password').css('color') =='orange'){
        $('input[name=stuff-password]').focus();
        return false;
    }
    if($('#stuff-id').css('color') =='orange'){
        $('input[name=stuff-id]').focus();
        return false;
    }
//
    if($('#student-confirm-password').css('color') =='orange'){
        $('input[name=student-confirm-password]').focus();
        return false;
    }

    if($('input[name=student-password]').val() !== $('input[name=student-confirm-password]').val()){
        $('#student-confirm-password').css('color','orange').html('No Match');
        $('input[name=student-confirm-password]').focus();
        return false;
    }
    if($('#student-email').css('color') =='orange'){
        $('input[name=student-email]').focus();
        return false;
    }
    if($('#student-password').css('color') =='orange'){
        $('input[name=student-password]').focus();
        return false;
    }
    if($('#student-id').css('color') =='orange'){
        $('input[name=student-id]').focus();
        return false;
    }
//
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
    ////
    if($('#confirm-password').css('color') =='orange'){
        $('input[name=confirm-password]').focus();
        return false;
    }

    if($('input[name=password]').val() !== $('input[name=confirm-password]').val()){
        $('#confirm-password').css('color','orange').html('No Match');
        $('input[name=confirm-password]').focus();
        return false;
    }
    if($('#email').css('color') =='orange'){
        $('input[name=email]').focus();
        return false;
    }
    if($('#password').css('color') =='orange'){
        $('input[name=password]').focus();
        return false;
    }
    if($('#id').css('color') =='orange'){
        $('input[name=id]').focus();
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
                getData: 2
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=edit-first-name]').val(response.first_name);
                $('input[name=edit-last-name]').val(response.last_name);
                $('input[name=edit-email]').val(response.email);
                $('input[name=edit-id]').val(response.id_number);
                $('input[name=edit-gender]').val(response.gender);
                $('input[name=edit-password]').val(response.password);

            }});
        $('#edit-profile').modal('show');
    });


    $('.view-profile').on('click', function (){

        $.ajax({
            type: 'POST',
            url: './query.php',
            data: {
                getAdmin: -1
            },
            dataType: 'json',
            success: function (response) {

                var year = new Date();
                var age=response.id_number;
                age = age.substr(0,2);
                age = parseInt(age) > 50? "19"+age:"20"+age;
                age = year.getFullYear()- parseInt(age);
                $('.admin-name').html(response.name);
                $('.admin-email').html(response.email);
                $('.admin-id').html(response.id_number);
                $('.admin-gender').html(response.gender);
                $('.admin-age').html(age);
                $('.admin-sNumber').html(response.id);

            }});


        $('#view-profile').modal('show');
    });

    $('.view-picture').on('click', function () {

        $('#view-picture').modal('show');
    });


    //announcements
    $('.new-announce').on('click', function () {

        $('#new-announce').modal('show');
    });

    $('.delete-announce').on('click', function () {

        $('input[name=delete-announce]').val(this.id);
        $('.lbl-dlt').html('Confirm delete for announcement id: <i class="text-danger">'+this.id+'</i>');
        $('#delete-announce').modal('show');
    });
    $('.edit-announce').on('click', function () {
        $('input[name=announce-id]').val(this.id);
        $.ajax({
            type: 'POST',
            url: './query.php',
            data: {
                getAnnounce: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('textarea[name=edit-news]').val(response.news);

            }});
        $('#edit-announce').modal('show');
    });



    //admin
    $('.edit-admin').on('click', function () {

        if($(this).attr('class').indexOf('profile') !== -1){
            $('.ad-prof').html('Edit Profile');
        }
        $('input[name=edit-admin]').val(this.id);
        $.ajax({
            type: 'POST',
            url: './query.php',
            data: {
                getAdmin: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=edit-name]').val(response.name);
                $('input[name=edit-email]').val(response.email);
                $('input[name=edit-id]').val(response.id_number);
                $('select[name=edit-gender]').val(response.gender);
                $('input[name=edit-password]').val(response.password);

            }});
        $('#edit-admin').modal('show');
    });

    $('.delete-admin').on('click', function () {

        $('input[name=delete-admin]').val(this.id);
        $('.lbl-dlt').html('Confirm delete for admin id: <i class="text-danger">'+this.id+'</i>');
        $('#delete-admin').modal('show');
    });


    //student
    $('.edit-student').on('click', function () {
        $('input[name=edit-student]').val(this.id);
        $.ajax({
            type: 'POST',
            url: './query.php',
            data: {
                getStudent: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=student-first-name]').val(response.first_name);
                $('input[name=student-last-name]').val(response.last_name);
                $('input[name=student-email]').val(response.email);
                $('input[name=student-id]').val(response.id_number);
                $('select[name=student-gender]').val(response.gender);
                $('select[name=student-status]').val(response.name);
                $('input[name=student-password]').val(response.password);

            }});
        $('#edit-student').modal('show');
    });

    $('.delete-student').on('click', function () {

        $('input[name=delete-student]').val(this.id);
        $('.lbl-dlt').html('Confirm delete for student <i class="text-danger">'+this.id+'</i>');
        $('#delete-student').modal('show');
    });


    //stuff
    $('.edit-stuff').on('click', function () {
        $('input[name=edit-stuff]').val(this.id);
        $.ajax({
            type: 'POST',
            url: './query.php',
            data: {
                getStuff: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=stuff-first-name]').val(response.first_name);
                $('input[name=stuff-last-name]').val(response.last_name);
                $('input[name=stuff-email]').val(response.email);
                $('input[name=stuff-id]').val(response.id_number);
                $('select[name=stuff-gender]').val(response.gender);
                $('select[name=stuff-status]').val(response.name);
                $('input[name=stuff-password]').val(response.password);

            }});
        $('#edit-stuff').modal('show');
    });

    $('.delete-stuff').on('click', function () {

        $('input[name=delete-stuff]').val(this.id);
        $('.lbl-dlt').html('Confirm delete for stuff <i class="text-danger">'+this.id+'</i>');
        $('#delete-stuff').modal('show');
    });


    $('.add-stuff').on('click', function () {
        $('.add-user-id').html('<input name="add-stuff" value="add-stuff" hidden>');
        $('.add-title-user').html('Add Stuff');
        $('input[name=name]').attr('required',false).hide();
        $('input[name=first-name]').show();
        $('input[name=last-name]').show();
        $('#add-user').modal('show');
    });

    $('.add-student').on('click', function () {
        $('.add-user-id').html('<input name="add-student" value="add-student" hidden>');
        $('.add-title-user').html('Add Student');
        $('input[name=name]').attr('required',false).hide();
        $('input[name=first-name]').show();
        $('input[name=last-name]').show();
        $('#add-user').modal('show');
    });

    $('.add-admin').on('click', function () {
        $('.add-user-id').html('<input name="add-admin" value="add-admin" hidden>');
        $('.add-title-user').html('Add Admin');
        $('input[name=name]').show();
        $('input[name=first-name]').attr('required',false).hide();
        $('input[name=last-name]').attr('required',false).hide();
        $('#add-user').modal('show');
    });


});
