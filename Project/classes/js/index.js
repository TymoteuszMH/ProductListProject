$(document).ready(function(){
	function getData(){
		$.ajax({
			url: 'classes/index/index_data.php',
			type: 'post',
			success: function(response){
				$('#data').html(response);
			}
		});
	}
	
	$("#delete").click(function(e){
		e.preventDefault();

		var elementIds = [];

		$(".delete-checkbox").each(function() {
			if($(this).is(":checked")) {
				elementIds.push($(this).val())
			}
		});
						
		$.ajax({
			url: 'classes/index/delete.php',
			type: 'post',
			data:{checkbox:elementIds},
			success: function(){
				getData();
			}
		});				
	});
	getData();
});
