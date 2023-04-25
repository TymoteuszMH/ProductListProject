$(document).ready(function(){
	$("#sub").click(function(e){
		
			
		e.preventDefault();

		var sku = $("#sku").val();
		var name = $("#name").val();
		var price = $("#price").val();
		var type = $("#productType").val();
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
		console.log(sku, name, price, type, desc)
		if(sku==''||name==''||price==''||type==''||desc=='') {
			alert("Please fill all fields.");
			return false;
		}

		
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
		
