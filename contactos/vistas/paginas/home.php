<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Home</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <button type="button" onclick="crear();" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i>
                Crear</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row" id="targes">
                </div>


            </div>
        </div>
    </div>
</div>



<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Responsive model</h4>
            <!-- sample modal content -->
            <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-modal="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Contacto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="formulario">
                                <div class="form-group">
                                    <label for="nombre" class="control-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>

                                <div class="form-group">
                                    <label for="telefono" class="control-label">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>

                                <div class="form-group">
                                    <label for="foto" class="control-label">foto:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>

                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripcion:</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                </div>

                                <div>
                                    <input type="hidden" id="accion" name="accion" value="crear">
                                    <input type="hidden" id="idusuario" name="idusuario" value="0">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal">Cerrar</button>
                                    <button class="btn btn-danger waves-effect waves-light">Guardar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.modal -->
            <img src="../assets/images/alert/model.png" alt="default" data-toggle="modal"
                data-target="#responsive-modal" class="model_img img-responsive">
        </div>
    </div>
</div>