$(function(){
    $(window).on('scroll',function(){
        console.log($(this).scrollTop())
        if($(this).scrollTop() >= 50)
        {
            $(".top").css({"background-color":"#0984E3"});
            $(".top li a").css("color","#FFF")
        }else{
            $(".top").css("background-color","transparent");
            $(".top li a").css("color","#000")

        }
    })
})