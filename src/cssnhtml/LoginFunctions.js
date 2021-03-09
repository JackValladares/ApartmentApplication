var loginButton = document.getElementByClassName("LoginButton");



function openLoginPage()
{

	var login = document.getElementById("loginInterface");


	if(login.style.display === "none")
	{
		login.style.display = "block";
	} 
	else
	{
		login.style.display = "none";
	}
	
		
	
}