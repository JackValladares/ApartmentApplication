var expandButton;
var searchInterface 
var email;
var theButton;
var searchButton;
var toggleButton;
var searchBar;
var type = "listings";
var field1, label1;
var field2, label2;
var field3, label3;
var field4;


window.addEventListener('load', (event) => {	

	searchButton = document.getElementById("homesearchbar")
	expandButton = document.getElementById("expandButton");
	toggleButton = document.getElementById("toggleSearch");
	theButton = document.getElementById("theButton");
	searchInterface = document.getElementById("search");;
	searchBar = document.getElementById("searchBar");
	searchBar.placeholder = "Milledgeville, Georgia";

	field1 = document.getElementById("field1");
	field2 = document.getElementById("field2");
	field3 = document.getElementById("field3");
	field4 = document.getElementById("field4");

	label1 = document.getElementById("label1");
	label2 = document.getElementById("label2");
	label3 = document.getElementById("label3");

	
	expandButton.addEventListener("click", toggleSearchVisibility, false);
	toggleButton.addEventListener("click", toggleSearchType, false);
	console.log('Search Function Successfully Loaded');
});



function toggleSearchVisibility()
{



	if(searchInterface.style.visibility === "hidden")
	{


		searchInterface.style.visibility = "visible";

		if(type === "profiles")
		{
			//hide label 3 and field 3
			label3.style.visibility = "hidden";
			field3.style.visibility = "hidden";
		}
		if(type === "listings")
		{
			//show label 3 and field 3
			label3.style.visibility = "visible";
			field3.style.visibility = "visible";
		}

		//console.log('visible');
		//console.log(searchInterface.style.display)
	} 
	else
	{
		searchInterface.style.visibility = "hidden";
		//hide label 3 and field 3
		label3.style.visibility = "hidden";
		field3.style.visibility = "hidden";



	}



}

function toggleSearchType()
{


	if (type === "listings") {

		field4.value = (type = "profiles");

		searchBar.placeholder = "John Doe";
		searchButton.action = "../Webpages/Listings.php?type=profiles";

		toggleButton.textContent = "Search for Listings";


		if(searchInterface.style.visibility === "visible")
		{
			//hide label 1 and field 1
			label3.style.visibility = "hidden";
			field3.style.visibility = "hidden";
		}


		//change text
		label1.innerHTML = "Drinker";
		label2.innerHTML = "Smoker";

		//add type to post request





	} else {
		field4.value = (type = "listings");
		searchBar.placeholder = "Milledgeville, Georgia";
		searchButton.action = "../Webpages/Listings.php?type=listings";

		toggleButton.textContent = "Search for Users";

		if(searchInterface.style.visibility === "visible")
		{
			//hide label 1 and field 1
			label3.style.visibility = "visible";
			field3.style.visibility = "visible";
		}

		//change text
		label1.innerHTML = "Pets";
		label2.innerHTML = "Smoke";







	}


}

