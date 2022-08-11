<div class="modal fade" id="modal_carga" tabindex="-1" role="dialog" aria-labelledby="cargaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <form method="post" action="{{ route('createColmena') }}">
            @csrf
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" style="font-family: 'Inter', sans-serif;">AGREGAR UNA COLMENA</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <br>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">vpn_key</i></span>
                            </div>                                
                            <input id="codigo" class="form-control" name="codigo" required placeholder="Codigo Colmena">
                            <small id="helper" class="text-muted w-100">
                                <i>Este codigo es unico y nos lo provee el hardware.</i> 
                            </small>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">badge</i></span>
                            </div>                                
                            <input id="nombre" name="nombre" class="form-control" required placeholder="Nombre Colmena">
                            <small id="helper" class="text-muted w-100">
                                <i>El nombre es opcional y nos servira para distinguir las colmenas.</i> 
                            </small>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">emoji_nature</i></span>
                            </div>                                
                            <select class="custom-select form-control" required id="activa" name="activa">
                              <option disabled selected hidden>Esta en actividad la colmena?</option>
                              <option value="1">SI</option>
                              <option value="0">NO</option>
                            </select>
                            <small id="helper" class="text-muted w-100">
                                <i>Actualmente la colmena se encuentra en funcionamiento?</i> 
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
        </form>
      </div>
    </div>
</div>

