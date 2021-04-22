$(document).ready(function(){
    getContactos();
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
    console.log(datosArreglo);
    let cadena = '';
    
    for (let i = 0; i < datosArreglo.length; i++) {
        cadena+=`
                <div class="col-lg-3 col-md-6">
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
                        <a href="javascript:void(0)" class="btn btn-danger">Eliminar</a>
                        <a href="javascript:void(0)" class="btn btn-success">Actualizar</a>
                    </div>
                </div>
            </div>
        `;
    }

    $("#targes").html(cadena);

}

