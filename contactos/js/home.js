$(document).ready(function(){
    getContactos();
    save();
});


function getContactos(){

    $.ajax({
        method:"GET",
        url:"contactos/controlador/ctr_home.php",
        data:{ accion: "getContactos" },
        success:function(respuestaServidor){
            pintarDatos(JSON.parse(respuestaServidor ));
        }
    });


}

function pintarDatos(datosArreglo){
    let cadena = '';
    console.log(datosArreglo);
    for (let i = 0; i < datosArreglo.length; i++) {
        cadena+=`
                <div class="col-lg-3 col-md-6" id="'${datosArreglo[i].con_id}'">
                <div class="card">
                    <img class="card-img-top img-responsive" src="${datosArreglo[i].con_imagen}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">${datosArreglo[i].con_nombre}</h4>
                        <h5 class="card-title">${datosArreglo[i].con_telefono}</h5>

                        <p class="card-text">
                        ${datosArreglo[i].con_descripcion}
                        </p>
                        <a href="javascript:void(0)" class="btn btn-primary">Ver</a>
                        <button class="btn btn-danger" onclick="eliminar('${datosArreglo[i].con_id}');">Eliminar</button>
                        <button class="btn btn-success" onclick="openModalUpdate('${datosArreglo[i].con_id}','${datosArreglo[i].con_nombre}','${datosArreglo[i].con_telefono}','${datosArreglo[i].con_descripcion}');">Actualizar</button>
                    </div>
                </div>
            </div>
        `;
    }

    $("#targes").html(cadena);

}

function openModalUpdate(id, nombre, telefono, descripcion){
    limpiarFormularios();
    $("#accion").val("actualizar");
    $("#idusuario").val(id);
    $("#nombre").val(nombre);
    $("#telefono").val(telefono);
    $("#descripcion").val(descripcion);
    $("#responsive-modal").modal("show");
}

function crear(){
    limpiarFormularios();
    $("#accion").val("crear");
    $("#idusuario").val(0);
    $("#responsive-modal").modal("show");
}


function save(){
    $("#formulario").on("submit", function(e){
        e.preventDefault();
        //-----------------------Crear formulario desde cero
        // var formData = new FormData();
        // formData.append("username", "Groucho");
        // formData.append("accountnum", 123456);
        // console.log(formData.get("username"));
        // ---------------------------

        var datos = new FormData( $("#formulario")[0] );
        // console.log(datos.get("nombre"));
        
        $.ajax({
            method:"POST",
            url:"contactos/controlador/ctr_home.php",
            data: datos,
            contentType:false,
            processData:false,
            cache:false,
            success:function(respuestaServidor){
                let respuesta = JSON.parse(respuestaServidor);
                alerta(respuesta);
            }
        });


    });
}


function limpiarFormularios(){
    $("#formulario")[0].reset();
}

function alerta(respuesta, id){
    if(respuesta.status===200){
        $("#responsive-modal").modal("hide");
        limpiarFormularios();
        alert("Actualizado correctamente");
        if(id !=0 ){
            console.log("eliminando targeta");
            $(`#${id}`).css('display', 'none');
        }
    }else{
        alert("Ocurrio un error inesperado");
    }
}

function eliminar(id){

    let confirmar = confirm("¿Esta seguro de que desea eliminar al usuario?");

    if(confirmar){
        $.ajax({
            method:"POST",
            url:"contactos/controlador/ctr_home.php",
            data: {accion:"eliminar", idUsuario:id},
            success:function(respuestaServidor){
                let respuesta = JSON.parse(respuestaServidor);
                alerta(respuesta, id);
            }
        });
    }
}