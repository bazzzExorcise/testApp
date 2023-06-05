let click = 1

$("#bar").click(function() {
  if(click == 1) {
    $("#bar-1").addClass("w-4");
    $("#bar-2").addClass("w-6");
    $("#bar-3").addClass("w-8");

    $("#bar-1").removeClass("w-7");
    $("#bar-2").removeClass("w-4");
    $("#bar-3").removeClass("w-6");

    $("#box-1").removeClass("-right-full");
    $("#box-1").addClass("right-0");
    $("#box-2").removeClass("-right-full");
    $("#box-2").addClass("right-1");
    click = 0
  }else{
    $("#bar-1").removeClass("w-4");
    $("#bar-2").removeClass("w-6");
    $("#bar-3").removeClass("w-8");

    $("#bar-1").addClass("w-7");
    $("#bar-2").addClass("w-4");
    $("#bar-3").addClass("w-6");

    $("#box-1").addClass("-right-full");
    $("#box-1").removeClass("right-0");
    $("#box-2").addClass("-right-full");
    $("#box-2").removeClass("right-1");
    click = 1 
  }
})

$("#pass-button").change(function (e) { 
  e.preventDefault();
  var isCheck = $(this).prop('checked')
  if(isCheck) {
    $("#password").attr("type", "text");
    $(".bg-pass").toggleClass("h-0");
    $(".bg-pass").toggleClass("h-4");
    $(".bg-pass").toggleClass("w-0");
    $(".bg-pass").toggleClass("w-4");
  }else{
    $("#password").attr("type", "password");
    $(".bg-pass").toggleClass("h-0");
    $(".bg-pass").toggleClass("h-4");
    $(".bg-pass").toggleClass("w-0");
    $(".bg-pass").toggleClass("w-4");
  }
});