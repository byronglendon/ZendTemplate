function deleteConf($path,$controller,$action,$id)
{
	var answer = confirm('Are you sure you want to delete this record and all associated entries?');
	if (answer){ 
		$location = $path;
		//alert($location+'/'+$controller+'/'+$action+'/id/'+$id);
		window.location = $location+'/'+$controller+'/'+$action+'/id/'+$id;
	}

}


function test()
{
	alert("Testing");
}