function start_countdown()
{
 var counter=900;
 
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
   document.getElementById("countdown").innerHTML=counter+"s";
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
      window.location="";
     }
   });
   }
   counter--;
 }, 1000)
}