<div class="modal fade" id="modal_config" tabindex="-1" role="dialog" aria-labelledby="cargaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <form method="post" action="{{ route('modifyColmena') }}">
            @csrf
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" style="font-family: 'Inter', sans-serif;">MODIFICAR UNA COLMENA</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <input type="hidden" id="idConf" name="idConf"/>
                <div class="modal-body">
                    <br>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">vpn_key</i></span>
                            </div>                                
                            <input id="codigoConf" class="form-control" name="codigoConf" required placeholder="Codigo Colmena" disabled>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">badge</i></span>
                            </div>                                
                            <input id="nombreConf" name="nombreConf" class="form-control" required placeholder="Nombre Colmena">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" style="background-color:#F6E300;"><i class="material-icons">emoji_nature</i></span>
                            </div>                                
                            <select class="custom-select form-control" required id="activaConf" name="activaConf">
                              <option disabled selected hidden>Esta en actividad la colmena?</option>
                              <option value="1">SI</option>
                              <option value="0">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="deleteBtn" type="button" class="btn btn-danger" onclick="deleteColmenaConfig(this.value)">Eliminar</button>
                    <button type="submit" class="btn btn-info">Modificar</button>
                </div>
        </form>
      </div>
    </div>
</div>

