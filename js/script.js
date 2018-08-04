// 
// toggle password vsibility
// 
function show_password() {
	$('#password').attr('type', 'text');
	setTimeout(function(){
		$('#password').attr('type', 'password');
	},1500);
}

// 
// password match checking
// 
function password_check() {
	var pass = $('#password').val();
	var c_pass = $('#confirm_pass').val();
	if (c_pass != '') {
		if (pass == c_pass) {
			var div = document.getElementById('match');
			document.getElementById('match').innerHTML = "<strong>passwords match</strong> <span class='grn glyphicon glyphicon-ok'></span>";
			div.classList.add("grn-block");
			div.classList.remove("red-block");
			$('#create_admin').removeAttr("disabled");
			$('#create_admin').addClass('btn-submit');
		}
		else{
			var div = document.getElementById('match');
			div.innerHTML = "<strong>passwords match</strong> <span class='red glyphicon glyphicon-remove'></span>";
			div.classList.add("red-block");
			div.classList.remove("grn-block");
			$('#create_admin').attr('disabled', true);
			$('#create_admin').removeClass('btn-submit');
		}
	}
}