$(document).ready(function(){
	/*Definindo máscara e formato para o input que define o dia da reunião*/
	$('#selectDay').mask('00/00/0000');
    	$('#selectDay').datepicker({
        	format: 'dd/mm/yyyy',
        	language : 'pt-BR',
        	startDate:'0d'

    });

    /*Definindo diretório raiz do sistema*/
    var DIRPAGE = "http://"+document.location.hostname+"/";
    var formDay = $('#formDay');

    /*Convertendo a data informada no input para o formato aceito no SQL*/
    $("#selectDay").on('change',function () {
        var date = $("#selectDay").datepicker("getDate");
        var valueDate = date.toISOString();
        valueDate = valueDate.substr(0,10);
        $('#day').val(valueDate);
        formDay.submit();
    });

});
