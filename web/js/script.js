$(document).ready(function() {	
    $('#fullpage').fullpage({
      'scrollBar': false,
      'sectionsColor': ['', ''],
        'afterLoad': function(sectionsColor, index) {

        }
    });
});





function submitEmail(){
    
    var targetName = $('input[name=i_name]').val();
    var targetEmail = $('input[name=i_email]').val();
    var targetMsg = $('textarea[name=i_msg]').val();
    var targetDate = $('input[name=i_date]').val();
    var targetPwd = $('input[name=i_pwd]').val();

    
    if(targetName != "" && targetEmail != "" && targetMsg != "" && targetDate != "" && targetPwd != ""){
        var emailReq = {
            'userName' : targetName,
            'userEmail' : targetEmail,
            'userMsg' : targetMsg,
            'userDate' : targetDate,
            'userPwd' : targetPwd,
        };

        $.ajax({
            type: "POST",
            data: emailReq,
            url: "php/mail.php",
            success: function(data){                
                $('input[name=i_name]').val('');
                $('input[name=i_email]').val('');
                $('input[name=i_date]').val('');
                $('input[name=i_pwd]').val('');

                $('textarea[name=i_msg]').val('');
                
                $('#c_lb_email').addClass('open');
                window.setTimeout(function(){
                    $('#c_lb_email').removeClass('open');
                }, 2500);
            }
        });
    }
    else{
        /*alert("try again");*/
    }
}

