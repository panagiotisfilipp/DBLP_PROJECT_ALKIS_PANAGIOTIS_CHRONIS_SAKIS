
$(document).ready(function(){
$('button#btn_login').click(function(){
    var username=$('#name').val();
	var password=$('#pswd').val();
	var action="login";
	if(username!="" && password!=""){
		$.ajax({
			url:"login.php",
			method:"POST",
			data:{username:username,password:password,action:action},
			success:function(data){
				if(data=='error')
				{
					alert("wrong data");
				}else
				{
					$('#modal_login').hide();
					location.reload();
				}
			}
		});
	}
	else
	{
		alert("Boath fields are required");
	}
    
});
});
