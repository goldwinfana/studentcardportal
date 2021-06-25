

function checkEmail() {

        var count =0;
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
                $('#val-email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
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

    let id = $('input[name=id]').val();
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

    let password = $('input[name=password]').val();
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
    let password = $('input[name=password]').val();
    let password_confirm = $('input[name=confirm-password]').val();

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
        $('input[name=confirm-password]').focus();
        return false;
    }
    if($('input[name=password]').val() !== $('input[name=confirm-password]').val()){
        $('#val-confirm-password').css('color','orange').html('No Match');
        $('input[name=confirm-password]').focus();
        return false;
    }
    if($('#val-email').css('color') =='orange'){
        $('input[name=email]').focus();
        return false;
    }
    if($('#val-password').css('color') =='orange'){
        $('input[name=password]').focus();
        return false;
    }
    if($('#val-id').css('color') =='orange'){
        $('input[name=id]').focus();
        return false;
    }
    return true;

}

function getDepartment() {
    var id = $('select[name=department]').val();
    $('select[name=faculty]').html('<option value="" selected disabled>Select faculty</option>');
    var response = JSON.parse(localStorage.getItem('faculty'));

   $.each(response,function (key,data) {
       if(id==data.depID){
           $('select[name=faculty]').append('<option value="'+data.id+'">'+data.name+'</option>')
       }
   });
}
function getFaculty() {
    $.ajax({
        type: 'POST',
        url: './request.php',
        data: {
            getDepartment: 2
        },
        dataType: 'json',
        success: function (response) {
            localStorage.setItem('faculty',JSON.stringify(response));
        }});
}

getFaculty();
