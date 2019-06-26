var loc = window.location;
var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
var urlActual = loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));

$("#registrar_asistente").click(function(){
    var empresa     =   $("#empresa").val();
    var nombre      =   $("#nombre").val();
    var ape_pat     =   $("#ape_pat").val();
    var ape_mat     =   $("#ape_mat").val();
    var correo      =   $("#correo").val();
    var telefono    =   $("#telefono").val();
    if(empresa !='' || nombre !='' || ape_pat !='' || ape_mat !='' || correo !='' || telefono !=''){
        var registro={
            'empresa':empresa,
            'nombre':nombre,
            'ape_pat':ape_pat,
            'ape_mat':ape_mat,
            'correo':correo,
            'telefono':telefono
        };
        registrar_asistente(registro);
    }else{
        alert('Verifica los datos introducidos');
    }
});

function registrar_asistente(registro){
    $.ajax({
        url: urlActual+'controller/?request=registro&accion=registrar_asistente',
        type:'POST',
        dataType:'JSON',
        data: {
            'registro':registro
        },
        success: function(response){
            if(response.status=='ok'){
                /*$("#empresa").val('');
                $("#nombre").val('');
                $("#ape_pat").val('');
                $("#ape_mat").val('');
                $("#correo").val('');
                $("#telefono").val('');*/
                $("#registro").html('');
                $("#registro").append('\
                            <p class="alert alert-success">\
                                <i class="fa fa-check"> Gracias por tu registro</i>\
                            </p>');
                //$('#modal_registro_completo').modal("toggle");
            }
        }
    });
}