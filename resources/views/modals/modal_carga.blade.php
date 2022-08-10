<div class="modal fade" id="modal_carga" tabindex="-1" role="dialog" aria-labelledby="cargaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <form method="post" action="">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">CARGAR UNA COLMENA</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="modal-body">
                            <label>NOMBRE:</label>
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" maxlength="120">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="modal-body">
                            <label>APELLIDO:</label>
                            <input class="form-control" type="text" id="apellido" name="apellido" placeholder="Apellido" maxlength="120">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="modal-body">
                            <label>ACTIVO:</label>
                            <select class="form-control form-control" id="activo" name="activo">
                                <option value="t">SI</option>
                                <option value="f">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="modal-body">
                            <label>DOCUMENTO:</label>
                            <input class="form-control" type="text" id="documento" name="documento" maxlength="120">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="modal-grupo-btn-create" name="modal-grupo-btn-create">Guardar</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>

