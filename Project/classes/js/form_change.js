$('#productType').change(function(){
    if($(this).val() == '1'){
        $('#Desc').html("<label for='size' class='form-label'>Size(MB): </label> <input type='number' step='any' class='form-control' id='size' name='desc' required><br>");
    }
    else if($(this).val() == '2'){
        $('#Desc').html("<label for='weight' class='form-label'>Weight(KG): </label> <input type='number' step='any' class='form-control' id='weight' name='desc' required><br>");
    }
    else if($(this).val() == '3'){
        $('#Desc').html("<label for='height' class='form-label'>Height(CM): </label><input type='number' step='any' class='form-control' id='height' name='height' required><label for='width' class='form-label'>Width(CM): </label><input type='number' step='any' class='form-control' id='width' name='width' required><label for='length' class='form-label'>Length(CM): </label><input type='number' step='any' class='form-control' id='length' name='length' required><br>");
    }
    else{
        $('#Desc').html("");
    }
});