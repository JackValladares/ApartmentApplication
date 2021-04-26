var expandButton;
var searchInterface 
var email;
var pass;
var theButton;

window.addEventListener('load', (event) => {	
	expandButton = document.getElementById("tinyexpandButton");
	theButton = document.getElementById("theButton");
	searchInterface = document.getElementById("tinySearch");;
	
	expandButton.addEventListener("click", toggleSearchVisibility, false);
	//theButton.addEventListener("click", login, false);
	console.log('Search Function Successfully Loaded');
});



function toggleSearchVisibility()
{
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
