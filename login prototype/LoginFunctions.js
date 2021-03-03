
var loginButton;
var loginInterface;
var email;
var pass;
var confirmButton;


	
loginButton = document.getElementById("loginButton");
confirmButton = document.getElementById("submitButton");
loginInterface = document.getElementById("loginInterface");
	
loginButton.addEventListener("click", toggleVisibility, false);
confirmButton.addEventListener("click", login, false);




function toggleVisibility()
{

	


	if(loginInterface.style.display === "none")
	{
		loginInterface.style.display = "block";
	} 
	else
	{
		loginInterface.style.display = "none";
	}
	
	this.removeEventListener("click", toggleVisibility);

}

function login()
{
	
	
	email = document.getElementById("email").value;
	pass = document.getElementById("password").value;
	
	alert(email + " " + pass);
	
	this.removeEventListener("click", login);

}