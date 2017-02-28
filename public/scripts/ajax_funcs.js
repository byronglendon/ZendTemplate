function handleResponse(data,target)
{
	if (returnedJson.length > 0) {
		var returnedJson = JSON.parse(returnedJson);
		for (i = 0; i < returnedJson.length; i++) {
		    alert(returnedJson[i]);
			$('#'+target).html(data);
		}
	}
}

function getValues(partid)
{
	var data = "key=>value";
		var URL = location.href.substring(0,location.href.lastIndexOf('public'));
		var path = URL+"public/Settings/getpartajaxAction/id/"+id;
		$.get(
				path,
				data,
				function(data) { handleResponse(data); },
				"json"		
				)		
}

function repeatAjax(){
	jQuery.ajax({
	          type: "POST",
	          url: 'load.php',
	          dataType: 'json',
	          success: function(resp) {
	                    jQuery('#out1').html(resp[0]);
	                    jQuery('#out2').html(resp[1]);
	                    jQuery('#out3').html(resp[2]);

	          },
	          complete: function() {
	                setTimeout(repeatAjax,1000); //After completion of request, time to redo it after a second
	             }
	        });
	}