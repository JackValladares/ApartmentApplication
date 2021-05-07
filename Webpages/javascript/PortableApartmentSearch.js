var expandButtonT;
var searchInterfaceT
var emailT;
var theButtonT;
var searchButtonT;
var toggleButtonT;
var searchBarT;
var typeT = "listings";
var field1T, label1T;
var field2T, label2T;
var field3T, label3T;
var field4T;
var submitButtonT;
var get, get2, type;

window.addEventListener('load', (event) => {




	expandButtonT = document.getElementById("tinyexpandButton");
	theButtonT = document.getElementById("theButton");
	searchInterfaceT = document.getElementById("tinySearch");
	toggleButtonT = document.getElementById("tinytoggleSearch");
	searchBarT = document.getElementById("searchBarT");
	searchButtonT = document.getElementById("homesearch");
	submitButtonT = document.getElementById("tinysearchButton");

	field1T = document.getElementById("field1T");
	field2T = document.getElementById("field2T");
	field3T = document.getElementById("field3T");
	field4T = document.getElementById("field4T");

	label1T = document.getElementById("label1T");
	label2T = document.getElementById("label2T");
	label3T = document.getElementById("label3T");
	
	expandButtonT.addEventListener("click", toggleTinySearchVisibility, false);
	toggleButtonT.addEventListener("click", toggleTinySearchType, false);
	//theButton.addEventListener("click", login, false);
	console.log('Search Function Successfully Loaded');


	get = window.location.search.substr(1);

	type = get.split("&");

	console.log(type);
	type = type[4];

	if(type === "type=profiles")
	{
		toggleTinySearchType();
	}


});



function toggleTinySearchVisibility()
{
	if(searchInterfaceT.style.visibility === "hidden")
	{
		searchInterfaceT.style.visibility = "visible";
		//console.log('visible');
		//console.log(searchInterface.style.display)
	} 
	else
	{
		searchInterfaceT.style.visibility = "hidden";
		//console.log('invisible');
		//console.log(searchInterface.style.display)
	}
}

function toggleTinySearchVisibility()
{



	if(searchInterfaceT.style.visibility === "hidden")
	{


		searchInterfaceT.style.visibility = "visible";

		if(typeT === "profiles")
		{
			//hide label 3 and field 3
			label3T.style.visibility = "hidden";
			field3T.style.visibility = "hidden";
		}
		if(typeT === "listings")
		{
			//show label 3 and field 3
			label3T.style.visibility = "visible";
			field3T.style.visibility = "visible";
		}

		//console.log('visible');
		//console.log(searchInterface.style.display)
	}
	else
	{
		searchInterfaceT.style.visibility = "hidden";
		//hide label 3 and field 3
		label3T.style.visibility = "hidden";
		field3T.style.visibility = "hidden";



	}



}

function toggleTinySearchType()
{


	if (typeT === "listings") {

		field4T.value = (typeT = "profiles");

		searchBarT.placeholder = "John Doe";
		searchButtonT.action = "../Webpages/Listings.php?type=profiles";

		toggleButtonT.textContent = "Search for Listings";

		searchBarT.style.borderColor = "var(--richBlue)";

		logo.src = "../Webpages/imgs/ui/BlueLogo.png";

		submitButtonT.style.color = "var(--richBlue)";
		submitButtonT.style.borderColor = "var(--richBlue)";
		submitButtonT.style.backgroundColor = "var(--richBlue)";



		if(searchInterfaceT.style.visibility === "visible")
		{
			//hide label 1 and field 1
			label3T.style.visibility = "hidden";
			field3T.style.visibility = "hidden";
		}


		//change text
		label1T.innerHTML = "Drinker";
		label2T.innerHTML = "Smoker";

		//add type to post request





	} else {
		field4T.value = (typeT = "listings");
		searchBarT.placeholder = "Milledgeville, Georgia";
		searchButtonT.action = "../Webpages/Listings.php?type=listings";

		toggleButtonT.textContent = "Search for Users";

		searchBarT.style.borderColor = "var(--richPurple)";

		submitButtonT.style.color = "var(--richPurple)";
		submitButtonT.style.borderColor = "var(--richPurple)";
		submitButtonT.style.backgroundColor = "var(--richPurple)";

		logo.src = "../Webpages/imgs/ui/Logo.png";


		if(searchInterfaceT.style.visibility === "visible")
		{
			//hide label 1 and field 1
			label3T.style.visibility = "visible";
			field3T.style.visibility = "visible";
		}

		//change text
		label1T.innerHTML = "Pets";
		label2T.innerHTML = "Smoke";



	}


}