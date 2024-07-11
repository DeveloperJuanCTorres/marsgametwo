$(function(){
    $('#contents .typeBox[id != "tab1"]').hide();
    
    $("a").click(function(){
      
      $("#contents .typeBox").hide();
      
      $($(this).attr("href")).show();
      
      $(".current").removeClass("current");
      
      $(this).addClass("current");
      return false;
     });
  });