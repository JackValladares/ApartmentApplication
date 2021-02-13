function getAccountCreationInfo(){
	var email = document.getElementById("email-input").value;
	var password = document.getElementById("password-input").value;
	var f_name = document.getElementById("f-name-input").value;
	var l_nam = document.getElementById("l-name-input").value;
	var testH = document.getElementById("test");
	testH.innerHTML = email;
}
