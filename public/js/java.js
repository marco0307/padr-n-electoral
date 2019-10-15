/*Formato de la fecha*/
window.onload = function(e){
    var origen = $(location).attr('origin');
    $.get(origen + "/MilitantesProvincia", null, function(r){
        var resultados = [];
        
        $.map(r, function (obj, index) {
            resultados.push({name:obj.nombre,y:obj.cantidad});
        });

        Highcharts.chart('militantesProvinciasGraficoPie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Estadisticas'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Cantidad',
                colorByPoint: true,
                data: resultados
            }]
        });
    });

    
    
    let meses = ['Enero','Febrero','Marzo','Abrir','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    let fechaCreated = document.getElementsByClassName('fechaFormato');
    let fechaUpdated = document.getElementsByClassName('fechaFormatoUpdate');
    
    //Fecha created
    for(let i=0; i < fechaCreated.length; i++){

    let dateCreated = fechaCreated[i].textContent.split("-");

    let dividirCreated = dateCreated[2];
    let dividirDiaCreated = dividirCreated.split(" ");
    let diaCreated = dividirDiaCreated[0];

    let mesCreated = meses[dateCreated[1]-1];
    let anioCreated = dateCreated[0];    

    fechaCreated[i].textContent = diaCreated + '-' + mesCreated + '-' + anioCreated;
    }

    //Fecha Updated
    for(let i=0; i < fechaUpdated.length; i++){

    let date = fechaUpdated[i].textContent.split("-");

    let dividir = date[2];
    let dividirDia = dividir.split(" ");
    let dia = dividirDia[0];

    let mes = meses[date[1]-1];
    let año = date[0];
    let hora = dividirDia[1];

    fechaUpdated[i].textContent = dia + '-' + mes + '-' + año + ' (' + hora + ')';
    }
}

/*Eliminar usuario*/
function deleteUser()
{
    $valor = confirm('¿Desea eliminar este usuario?')

    if($valor == true){
        document.getElementById('delete-form').submit();
    }else{
        return false;
    }
}

$(document).ready(function() {  
    /*Select con buscador*/
    $('.js-select2').select2();
    //////////////////////////
    
    //Old de municipio y sectores por Jquery
    var origen = $(location).attr('origin');
    $("#provincia option:selected").each(function(){
        elegido = $(this).val();

        $.get(origen + "/municipios/"+elegido, null, function(r){
            var html = '';
            html = '<option value="">-- Municipio --</option>';
            $.map(r, function (obj, index) {
                var id_municipio = $("#id_municipio").val();
                if(id_municipio == obj["id"]){
                    html += '<option value="' + obj["id"] + '" selected>';
                }else{
                    html += '<option value="' + obj["id"] + '">';
                }
               
                html += obj["nombre"];
                html += '</option>';
            });
            $("#municipio").html(html);
        });
    });
////////////////////////////
    $("#municipio option:selected").each(function(){
        elegido = $(this).val();

        $.get(origen + "/sectores/"+elegido, null, function(r){
            var html = '';
            html = '<option value="">-- Sector --</option>';
            $.map(r, function (obj, index) {
                var id_sector = $("#id_sector").val();
                if(id_sector == obj["id"]){
                    html += '<option value="' + obj["id"] + '" selected>';
                }else{
                    html += '<option value="' + obj["id"] + '">';
                }
               
                html += obj["nombre"];
                html += '</option>';
            });
            $("#sector").html(html);
        });
    });

    //Cargar Municipios
    $(".municipios").change(function(){
        
        var id = $(this).val();
        if(id == ""){
            var html = '<option value="">-- Municipio --</option>';
            $("#municipio").html(html);
        }else{
            
            $.get(origen+"/municipios/"+id, null, function(r){
                var html = '';
                html = '<option value="">-- Municipio --</option>';
                $.map(r, function (obj, index) {
                    html += '<option value="' + obj["id"] + '">';
                    html += obj["nombre"];
                    html += '</option>';
                });
                $("#municipio").html(html);
            });
        }
    });
    //Cargar Sectores
    $(".sectores").change(function(){
        var id = $(this).val();
        if(id == ""){
            var html = '<option value="">-- Sector --</option>';
            $("#sector").html(html);
        }else{

            $.get(origen + "/sectores/"+id , null, function(r){
                var html = '';
                html = '<option value="">-- Sector --</option>';
                $.map(r, function (obj, index) {
                    html += '<option value="' + obj["id"] + '">';
                    html += obj["nombre"];
                    html += '</option>';
                });

                $("#sector").html(html);
            });
        }
    });
});


/*Validar que el input solo reciva numeros*/
function justNumbers(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
         
    return /\d/.test(String.fromCharCode(keynum));
}

