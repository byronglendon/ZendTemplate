function showhide(showID,hideID){
	showobj = document.getElementById(showID);
	hideobj = document.getElementById(hideID);
	if (showobj.style.display == "none"){
		showobj.style.display = "";
		hideobj.style.display = "none"; 
	} 
}


function showField(showID){
	showobj = document.getElementById(showID);
	showobj.style.display = "";
}
