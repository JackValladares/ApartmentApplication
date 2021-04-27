
var expandButton;
var searchInterface 
var email;
var pass;
var theButton;


window.addEventListener('load', (event) => {	

	expandButton = document.getElementById("expandButton");
	theButton = document.getElementById("theButton");
	searchInterface = document.getElementById("search");;
	
	expandButton.addEventListener("click", toggleSearchVisibility, false);
	//theButton.addEventListener("click", login, false);
	console.log('Search Function Successfully Loaded');
});



function toggleSearchVisibility()
{

	//alert("I hath been clicked");


	if(searchInterface.style.visibility === "hidden")
	{
		searchInterface.style.visibility = "visible";
		//console.log('visible');
		//console.log(searchInterface.style.display)
	} 
	else
	{
		searchInterface.style.visibility = "hidden";
		//console.log('invisible');
		//console.log(searchInterface.style.display)
	}



}

function login(queryResult)
{
	
	
	email = document.getElementById("email").value;
	pass = document.getElementById("password").value;
	
	alert("Logged in sir");
	
	this.removeEventListener("click", login);
	console.log('Login Function Toggled Toggled');
	console.log('Given Password: '+pass);
	console.log('Actual Password: '+queryResult);

}