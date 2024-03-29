$(document).ready(function(){
    //loading product types
	$.ajax({
		url: 'classes/form/modal.php',
		type: 'post',
		success: function(response){
			$('#productType').html(response);
		}
	});

    //changing product type in add_form.html after changing product's type
    $('#productType').change(function(){
        if($(this).val() == '1'){
            $('#Desc').html("<label for='size' class='form-label'>Size(MB): </label> <input type='number' step='any' class='form-control' id='size' name='desc'><br>");
        }
        else if($(this).val() == '2'){
            $('#Desc').html("<label for='weight' class='form-label'>Weight(KG): </label> <input type='number' step='any' class='form-control' id='weight' name='desc'><br>");
        }
        else if($(this).val() == '3'){
            $('#Desc').html("<label for='height' class='form-label'>Height(CM): </label><input type='number' step='any' class='form-control' id='height' name='height'><label for='width' class='form-label'>Width(CM): </label><input type='number' step='any' class='form-control' id='width' name='width'><label for='length' class='form-label'>Length(CM): </label><input type='number' step='any' class='form-control' id='length' name='length'><br>");
        }
        else{
            $('#Desc').html("");
        }
    });
});