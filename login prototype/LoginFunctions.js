
var loginButton;
var loginInterface 
var email;
var pass;
var confirmButton;


window.addEventListener('load', (event) => {	

	loginButton = document.getElementById("loginButton");
	confirmButton = document.getElementById("submitButton");
	loginInterface = document.getElementById("loginInterface");;
	
	loginButton.addEventListener("click", toggleVisibility, false);
	confirmButton.addEventListener("click", login, false);
	console.log('Page is fully loaded');
});



function toggleVisibility()
{

	


	if(loginInterface.style.display === "none")
	{
		loginInterface.style.display = "block";
		console.log('visible');
		console.log(loginInterface.style.display)
	} 
	else
	{
		loginInterface.style.display = "none";
		console.log('invisible');
		console.log(loginInterface.style.display)
	}



}

function login()
{
	
	
	email = document.getElementById("email").value;
	pass = document.getElementById("password").value;
	
	alert(email + " " + pass);
	
	this.removeEventListener("click", login);
	console.log('Login Function Toggled Toggled');

}