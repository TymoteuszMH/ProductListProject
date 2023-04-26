$(document).ready(function(){
	//submiting form
	$("#sub").click(function(e){
		
			
		e.preventDefault();

		var sku = $("#sku").val();
		var name = $("#name").val();
		var price = $("#price").val();
		var type = $("#productType").val();
		//validating description
		switch (type){
			case '1':
				var desc = $("#size").val() + 'kg';
				break;
			case '2':
				var desc = $("#weight").val() + 'MB';
				break;
			case '3':
				var desc = $("#height").val() + '/' + $("#width").val() + '/' + $("#length").val();
				break;
			default:
				var desc = "";
		}
		//finding blank fields
		if(sku==''||name==''||price==''||type==''||desc=='') {
			alert("Please fill all fields.");
			return false;
		}
		//sending post request to form.php
		$.ajax({
			type: "POST",
			url: 'classes/form/form.php',
			data: {
				sku: sku,
				name: name,
				price: price,
				type: type,
				desc: desc
				},
			//if sku already exist in data base site is showing error above form
			success: function(data) {
				if(data == 'error'){
					$("#error").html("SKU already exist!");
					return false;
				}else{
					window.location.href="index.html"
				}
				},
			error: function(xhr, status, error) {
				console.error(xhr);
			}
		});
	});
});
		
