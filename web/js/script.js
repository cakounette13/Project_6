$(document).ready(function() {	
    $('#fullpage').fullpage({
      'scrollBar': false,
      'sectionsColor': ['#31547F', '#5cb7a1', '#3c91ce', '#d96b54', '#ececec'],
        'afterLoad': function(sectionsColor, index) {

        }
    });
});





function submitEmail(){
    
    var targetName = $('input[name=i_name]').val();
    var targetEmail = $('input[name=i_email]').val();
    var targetMsg = $('textarea[name=i_msg]').val();
    
    if(targetName != "" && targetEmail != "" && targetMsg != ""){
        var emailReq = {
            'userName' : targetName,
            'userEmail' : targetEmail,
            'userMsg' : targetMsg
        };

        $.ajax({
            type: "POST",
            data: emailReq,
            url: "php/mail.php",
            success: function(data){                
                $('input[name=i_name]').val('');
                $('input[name=i_email]').val('');
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

