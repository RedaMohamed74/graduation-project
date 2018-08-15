$(document).ready(function(){
    //nice scroll
    $("body").niceScroll({
        cursorcolor:"#2884de",
        cursorwidth:"7px"
    });



    var toggle1 = $(".login-toggle");
    var toggle2 = $(".register-toggle");
    var form1 = $(".form-login");
    var form2 = $(".form-register");

    form2.hide();
    toggle1.addClass("member");
    toggle1.click(function(){
        toggle1.addClass("member");
        toggle2.removeClass("member");
        form1.show(150);
        form2.hide(150);
    });
    toggle2.click(function(){
        toggle2.addClass("member");
        toggle1.removeClass("member");
        form2.show(150);
        form1.hide(150);
    });
    $("a.active").css("color","#000");

});
// loading screen
$(window).load(function(){

    
    $(".loading-overlay .spinner").fadeOut(1500,
    function()
    {
        $("body").css("overflow","none"); //show the scroll
        $(this).parent().fadeOut(1500,
        function()
        {
            $(this).remove();
        });

    });
});