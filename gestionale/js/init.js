// document ready function

var $ = jQuery.noConflict();

$(document).ready(function() {
    
    $("input, textarea, select").not('.nostyle').uniform();
    $('select.select2').select2();
    
    $("#loginForm").validate({
        rules: {
            username: {
                required: true,
                minlength: 4
            },
            password: {
                required: true,
                minlength: 6
            }  
        },
        messages: {
            username: {
                required: "Fill me please",
                minlength: "My name is bigger"
            },
            password: {
                required: "Please provide a password",
                minlength: "My password is more that 6 chars"
            }
        }   
    });
    
    $('#sidebarbg').css( 'min-height' , $('#page').css('height') );
    
});