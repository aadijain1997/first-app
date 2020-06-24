$(document).ready(function(){
    $(".user1").keyup(function(){
        $(".user").hide();
    });
    $(".maill1").keyup(function(){
        $(".mail1").hide();
    });
    $(".pass1").keyup(function(){
        $(".pass").hide();
    });
    $(".conpass1").keyup(function(){
        $(".conpass").hide();
    });
    $(".logpass1").keyup(function(){
        $(".logpass").hide();
	});
	$(".loguser1").keyup(function(){
        $(".loguser").hide();
	});
	
});
	
$(document).ready(function(){
	$(".register").click(function(){
		var  username=$("#username").val();
		var email=$("#email").val();
		var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
		var password=$("#password").val();
		var confirm_password=$("#confirm_password").val();
		 if(username=="")
		{
			$(".user").text("Please enter username");
			$(".user").css("color","red");
			$(".mail1").text("");
			$(".pass").text("");
			$(".conpass").text("");

		}

		else if(email=="")
		{
			$(".user").text("");
			$(".mail1").text("Please enter Email");
			$(".mail1").css("color","red");
			$(".pass").text("");
			$(".conpass").text("");


		}
		else if(!emailRegex.test(email))
		{
			$(".mail1").show();
			$(".mail1").text("Please enter valid Email");
			$(".mail1").css("color","red");
		}
		else if(password=="")
		{
			$(".user").text("");
			$(".mail1").text("");
			$(".pass").text("Please enter Password");
			$(".pass").css("color","red");
			$(".conpass").text("");

		}
		else if(confirm_password=="")
		{
			$(".user").text("");
			$(".mail1").text("");
			$(".pass").text("");
			$(".conpass").text("Please enter Confirm Password");
			$(".conpass").css("color","red");

		}
		else if(confirm_password!==password)
		{
			$(".conpass").text("Password Missmatch");
			$(".conpass").css("color","red");
		}
		else
		{
			$(".user").text("");
			$(".mail1").text("");
			$(".pass").text("");
			$(".conpass").text("");

			$.ajax({
				url:"signupsave.php",
				type:"POST",
				data:{username:username,email:email,password:password},
				success:function(data){	
					if(data=="already")
					{
						alert("wrong");
					}
					else if(data=="right")
					{
						window.location="login.php";
					}
				}
			});
		}
	});
});



//add more then one attachment in mail.php
function addMoreAttachment() {
    $(".attachment-row:last").clone().insertAfter(".attachment-row:last");
    $(".attachment-row:last").find("input").val("");
}
$(document).ready(function(){
    $(".close").click(function(){
        $("#myAlert").alert('close');
    });
});
$(document).ready(function(){
    $(".cross").click(function(){
		$(".Alert").hide();
    });
});
//add user in user-data.php
function checkform() {
	
	var valid1= validateContact();

	if (valid1) {

$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide');
						// alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});

	}
}
//validation for add user
function validateContact() {
    var  valid = true;	
    if(!$("#username").val()) { 
		$("#username-info").show();
		$("#username-info").html("(required)");
		$("#username-info").css("color","red");
		$("#username").css("border-color","red");
		$(".user-name").keyup(function(){
			$("#username-info").hide();
			$("#username").css("border-color","green");
		});
		valid = false;
	}
	
	
    if(!$("#email").val()) {
		$("#email-info").show();
		$("#email-info").html("(required)");
		$("#email-info").css("color","red");
		$("#email").css("border-color","red");	
		$(".user-email").keyup(function(){
			$("#email-info").hide();
			$("#email").css("border-color","green");
		});
        valid = false;
	}
	

     if(!$("#password").val()) {
		$("#password-info").show();
		$("#password-info").html("(required)");
		$("#password-info").css("color","red");
		$("#password").css("border-color","red");
		$(".user-pass").keyup(function(){
			$("#password-info").hide();
			$("#password").css("border-color","green");
		});
        valid = false;
	}  
	
	
    if($("#email").val()) {
    	var x = $("#email").val();
    	var atposition=x.indexOf("@");  
		var dotposition=x.lastIndexOf(".");  
		if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
			alert("invalid email");
  		return false;  
  		}  
  	}


return valid;

}
//update users in user data.php
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var username=$(this).attr("data-username");
		var email=$(this).attr("data-email");
		var password=$(this).attr("data-password");
		var user_type=$(this).attr("data-user_type");
		$('#id_u').val(id);
		$('#username_u').val(username);
		$('#email_u').val(email);
		$('#password_u').val(password);
		$('#user_type_u').val(user_type);
	});
	
	function checkform1() {
	
		var valid2= validateContact1();
	
		if (valid2) {
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
					//	alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
}
	}

function validateContact1() {
    var  valid = true;	
    if(!$("#username_u").val()) { 
		$("#usernamee-info").show();
		$("#usernamee-info").html("(required)");
		$("#usernamee-info").css("color","red");
		$("#username_u").css("border-color","red");
		$(".user-name-e").keyup(function(){
			$("#usernamee-info").hide();
			$("#username_u").css("border-color","green");
		});
		valid = false;
	}
	
	
    if(!$("#email_u").val()) {
		$("#emaill-info").show();
		$("#emaill-info").html("(required)");
		$("#emaill-info").css("color","red");
		$("#email_u").css("border-color","red");	
		$(".user-email-e").keyup(function(){
			$("#emaill-info").hide();
			$("#email_u").css("border-color","green");
		});
        valid = false;
	}
	

     if(!$("#password_u").val()) {
		$("#passwordd-info").show();
		$("#passwordd-info").html("(required)");
		$("#passwordd-info").css("color","red");
		$("#password_u").css("border-color","red");
		$(".user-pass-e").keyup(function(){
			$("#passwordd-info").hide();
			$("#password_u").css("border-color","green");
		});
        valid = false;
	}  
	
	
    if($("#email_u").val()) {
    	var x = $("#email_u").val();
    	var atposition=x.indexOf("@");  
		var dotposition=x.lastIndexOf(".");  
		if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
			alert("invalid email");
  		return false;  
  		}  
  	}

return valid;
//delete user in user-data.php
}

	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "save.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
			
			}
		});
	});
//delete multiple users
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Please select records."); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "save.php",
					cache:false,
					data:{
						type: 4,						
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {	
							$("#"+ids[i]).remove(); 
						}	
					} 
				}); 
			}  
		} 
	});


