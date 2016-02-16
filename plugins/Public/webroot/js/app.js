$(document).ready(function(){
    $("#services").click(function(e){
        e.preventDefault();
        var content = $(".ui-content");
        if(content.hasClass("open")){
            content.slideUp("slow");
            content.removeClass("open");
        }
        else{
            content.slideDown("slow");
            content.addClass("open");
        }
    });
});