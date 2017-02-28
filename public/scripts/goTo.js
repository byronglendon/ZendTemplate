function goTo($URL)
{
	window.location.href=$URL;
	//return false;
}

function toggleDepartment()
{
	var id = document.getElementById('department').value;
	var URL = location.href.substring(0,location.href.lastIndexOf('public'));
	var path = URL+"public/Transfer/index/Department/"+id;
	window.location.href=path;
}