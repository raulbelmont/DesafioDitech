$(document).ready(function(){
alert('to aqui');
	$('#selectDay').mask('00/00/0000');
    	$('#selectDay').datepicker({
        	format: 'dd/mm/yyyy',
        	language : 'pt-BR',

    });

    $("#selectDay").on('change',function () {
        var date = $("#selectDay").datepicker("getDate");
        var valueDate = date.toISOString();
        $('#day').val(valueDate);
    });

});
