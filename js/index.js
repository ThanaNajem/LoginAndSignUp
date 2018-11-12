$(function () {
	$('.registrationStatus').text("");

	//main event
	$("#sign_up").on("click", function (event) {
		//functions  to run
		validateInputs();
		event.preventDefault()
	});


	function validateInputs() {
		var len = 0;
		var validateEachInputInForm = false;

		$(".signUp input").each(function () {

			var inputVal = $.trim($(this).val());

			if (checkIfInputIsEmpty(inputVal) && checkIfPasswordAcheieveSomeRegularExpression(inputVal)) {
				validateEachInputInForm = true;
				len++;
			} else if (checkIfInputIsEmpty(inputVal) && checkIfNameAcheieveSomeRegularExpression(inputVal)) {
				validateEachInputInForm = true;
				len++;

			} else if (checkIfInputIsEmpty(inputVal) && checkIfNameAcheieveSomeRegularExpression(inputVal)) {
				validateEachInputInForm = true;
				len++;

			} else if (checkIfInputIsEmpty(inputVal) && checkIfThisIsAnEmail(inputVal)) {
				validateEachInputInForm = true;
				len++;
			} else {
				validateEachInputInForm = false;


			}

			if (!validateEachInputInForm) {
				$(this)
					.siblings("pre")
					.addClass("show");

				$('.registrationStatus').text("");
			} else {
				$(this)
					.siblings("pre")
					.removeClass("show");

			}

		});

		var signUpInputLength = $(".signUp input").length;
		console.log(signUpInputLength + len);
		if (signUpInputLength == len) {
			signUp();
			$('input').val('');
			$('.registrationStatus').text("");
		}


	}

	$("#login").on("click", function (event) {
		//functions  to run 
		submitLoginForm();
		event.preventDefault()
	});
	// autherisation
	function submitLoginForm() {
		var usrNameOrEmail = $.trim($('#usrNameOrEmail').val());
		var pass = $.trim($('#pass').val());
		if (checkIfInputIsEmpty(usrNameOrEmail) && checkIfInputIsEmpty(pass)) {

			$('.log input')
				.siblings("pre")
				.removeClass("show");

			$.ajax({
				url: "login.php",
				method: "POST",
				data: {
					usrName: usrNameOrEmail,
					userPass: pass
				},
				success: function (data) {

					if (data) {

						window.location.href = "HPg.php";
					} else {

						window.location.href = "index.php";
					}

				},

				error: function (data) {
					console.log('---------error');
					console.log(data);
					console.log(data.responseText);


				}
			});
		} else {
			$('.log input')
				.siblings("pre")
				.addClass("show");

		}

	}


	function signUp() {
		var fname = $.trim($('#fname').val());
		var lname = $.trim($('#lname').val());
		var email = $.trim($('#email').val());
		var password = $.trim($('#password').val());

		$.ajax({
			url: "signUp.php",
			method: "POST",
			data: {
				UsrFname: fname,
				UsrLname: lname,
				UsrEmail: email,
				UsrPass: password
			},
			success: function (data) {


				var jsonData = JSON.stringify(data)
				var obj = JSON.parse(jsonData)
				//console.log(obj)
				if (obj.done) {
					$('.registrationStatus').text('You registered successfully, You can move into homepage');

				} else

				{

					$('.registrationStatus').text("You don\'t registered may be entered email exist");

				}
			},

			error: function (data) {
				console.log('---------error');
				console.log(data);
				console.log(data.responseText);


			}
		});
	}
	// regx here
	function checkIfPasswordAcheieveSomeRegularExpression(password = "") {
		var regExp = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]{2,})(?=.*[!@#\$%\^&\*])(?=.{8,})");

		return regExp.test(password);
	}

	function checkIfThisIsAnEmail(emailInput = "") {

		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		return testEmail.test(emailInput);


	}

	function checkIfInputIsEmpty(input = "") {
		return input.length != 0;
	}

	function checkIfNameAcheieveSomeRegularExpression(name = "") {

		return /^([a-zA-Z' ]+)$/.test(name);

	}
});