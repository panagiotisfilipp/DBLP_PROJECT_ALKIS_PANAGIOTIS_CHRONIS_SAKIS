
$(document).ready(function(){

$('button#btn_register').click(function(){
    var username=$('#username').val();
	var password_1=$('#password_1').val();
	var password_2=$('#password_2').val();
	var email=$('#email').val();
	var action="register";
	if(password_1==password_2){
		$.ajax({
			url:"register.php",
			method:"POST",
			data:{username:username,password_1:password_1,password_2:password_2,email:email,action:action},
			success:function(data){
				if(data=='success')
				{
					$('#modal_login').hide();
					location.reload();
					
				}else
				{
					alert("wrong data");
				}
			}
		});
	}
	else
	{
		alert("pasw do no match");
	}
    
});

});
