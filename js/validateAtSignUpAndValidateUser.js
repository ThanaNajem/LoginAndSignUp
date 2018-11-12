$(function () {
	/* start sign up validation */
	$("#signUpForm").validate({
		rules: {
			fname: {
				required: true,
				lettersonly: true,
				minlength: 1
			},
			lname: {
				required: true,
				lettersonly: true,
				minlength: 1
			},
			email: {
				required: true,
				email: true
			},
			password: {


				required: true,
				validatePassword: true,
				minlength: 8
			}
		},
		submitHandler: function (form) {
			console.log($(form).serialize())
			$.ajax({
				type: "POST",
				url: "signUp.php",
				data: $(form).serialize(),
				success: function (data) {
					console.log(data)
					var registrationStatusDivSelector = $('#registrationStatus');
					if (data == true) {
						registrationStatusDivSelector.empty();
						registrationStatusDivSelector.append('<span style="color:green;font-size:20px;">Your registration was completed successfully, to redirect into home page please click here </span>');

						registrationStatusDivSelector.append('<a href="HPg.php">Home page</a>');
						$('input').val('');
					} else {

						registrationStatusDivSelector.empty();
						registrationStatusDivSelector.append('<p style="color:red;font-size:20px;">Your email exist, please try again.</p>');

					}


				}
			});
			return false; // required to block normal submit since you used ajax
		}
	});

	$.validator.addMethod("validatePassword", function (passwordValue) {
		var regularExpressionValidate = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]{2,})(?=.*[!@#\$%\^&\*])(?=.{8,})");

		return regularExpressionValidate.test(passwordValue);
	});
	jQuery.extend(jQuery.validator.messages, {
		validatePassword: 'The password should be minimum of 8 characters length with at least 1 special char and 2 digits and one capital letter'
	});

	/* end sign up validation */
	/* start validate login */
	$("#loginForm").validate({
		rules: {
			password: {
				required: true
			},
			userName: {
				required: true,
				email: true
			}
		},
		submitHandler: function (form) {
			console.log($(form).serialize())
			$.ajax({
				type: "POST",
				url: "login.php",
				data: $(form).serialize(),
				success: function (data) {
					console.log(data)

					var loginStatusDivSelector = $('#warning');
					if (data == true) {

						loginStatusDivSelector.empty();
						$('input').val('');
						window.location.href = "HPg.php";

					} else {

						loginStatusDivSelector.empty();
						loginStatusDivSelector.append('<p style="color:red;font-size:20px;">Incorrect username or password.</p>');

					}


				}
			});
			return false;  
		}
	});

 
	/* end validate login */
});