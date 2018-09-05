$(function () {

	$('.success').text("");
	$("a").on("click", function () {
		$($(this).attr("data")).removeClass("d-none");
		$($(this).attr("data-parent")).addClass("d-none");
	});
	//main event
	$("#sign_up").on("click", function (event) {
		//functions  to run
		EmpInputs();
		 event.preventDefault()
	});
	$("#login").on("click", function (event) {
		//functions  to run
		login();
 // event.preventDefault()
	});
	// autherisation
	function login()
	{

	var usrNameOrEmail = $('#usrNameOrEmail').val();
	var pass = $('#pass').val();
if (notEmptyInput(usrNameOrEmail)&&notEmptyInput(pass)) 
		{

$( '.log input')
					.siblings("pre")
					.removeClass("show");

			 $.ajax({
	url: "login.php",
	method: "POST",
	data: {usrName:usrNameOrEmail,userPass:pass},
	success:function(data){
		 alert(data)
 if (data) 
 {
 	window.location.href = "HPg.php";
 }
else
{

 	window.location.href = "index.php";
}

		 
		// alert(data)
		 // console.log(data) 
	},
		
error: function(data){
console.log('---------error');
console.log(data);
console.log(data.responseText);
 
 
}
});
		}
		else
		{
$( '.log input')
					.siblings("pre")
					.addClass("show");
		}

	}

	// function signUp()
	// {

	// }
	//for Empty inputs
	function EmpInputs() 
	{
 var isSignUp=true;
		var flag = false;
		$(".sign input").each(function () {

			var inputVal = $(this).val(); 
			 alert(notEmptyInput(inputVal) && check(inputVal))
			if (notEmptyInput(inputVal) && check(inputVal)) {
				flag = true;
			} else if (notEmptyInput(inputVal) && checkName(inputVal)) {
				flag = true;
			} else if (notEmptyInput(inputVal) && checkName(inputVal)) {
				flag = true;
			} else if (notEmptyInput(inputVal) && isThisEmail(inputVal)) {
				flag = true;


			} else {
				flag = false;
isSignUp=false;
			 

			}

		 if (!flag) {
				$(this)
					.siblings("pre")
					.addClass("show");
			} else {
				$(this)
					.siblings("pre")
					.removeClass("show");

				

			}

		});
		if (isSignUp) 
		{
			signUp();
			$('input').val('');
		}	
	}
	function signUp()
	{
	var fname =	$('#fname').val();
	var lname =	$('#lname').val();
	var email = $('#email').val();
	var password = $('#password').val();
		
			 $.ajax({
	url: "signUp.php",
	method: "POST",
	data: {UsrFname:fname,UsrLname:lname,UsrEmail:email,UsrPass:password},
	success:function(data){
		 alert(data)
 if (data) 
 {
	$('.success').text('You registered successfully, You can move into homepage');

//window.location.href = "HPg.php";
 }
else

{

	$('.success').text("'You don\'t registered may be entered email exist'");
		
}
		 
		// alert(data)
		 // console.log(data) 
	},
		
error: function(data){
console.log('---------error');
console.log(data);
console.log(data.responseText);
 
 
}
});
	}
	// regx here
	function check(password = "") {
		var re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]{2,})(?=.*[!@#\$%\^&\*])(?=.{8,})");

		return re.test(password);
	}

	function isThisEmail(emailInput = "") {

		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		return testEmail.test(emailInput);


	}

	function notEmptyInput(input = "") {
		return input.length != 0;
	}

	function checkName(name = "") {
		return /^([a-zA-Z' ]+)$/.test(name);
	}
});