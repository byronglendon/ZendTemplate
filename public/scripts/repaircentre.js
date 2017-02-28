var $invalid = [];

function validateProcess($QuestionID,$validity) {
	if($validity == 1) {
		$invalid.push($QuestionID);
	} else {
		$index = $.inArray($QuestionID, $invalid);
		//alert($index);
		if($index>-1){
			$invalid.splice( $.inArray($QuestionID, $invalid), 1);
		}
	}
	
	if($.isEmptyObject($invalid)) {
		//alert("Invalid Array empty");
		$('#Pass').removeClass('btn-disabled');
		$('#Pass').addClass('search3btn');
	} else {
		//alert("There are still elements in the invalid array");
		$('#Pass').removeClass('search3btn');
		$('#Pass').addClass('btn-disabled');
	}
	//alert(JSON.stringify($invalid));
}

function isArray(x) {
    return x.constructor.toString().indexOf("Array") > -1;
}

function showObjectjQuery(obj) {
	  var result = "";
	  $.each(obj, function(k, v) {
	    result += k + " , " + v + "\n";
	  });
	  return result;
	}

function test() {
	var myarray = ['1','2','3'];
	if($.inArray('4', myarray)){
		alert("4 is in the array");
	} else {
		alert("4 NOT the array");
	}
}