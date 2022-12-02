@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">

      @include('modals.modal_carga')
      @include('modals.modal_config')
      <section class="jumbotron text-center" style="margin-bottom: 0; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
        <div class="container">
          <h1 class="jumbotron-heading">Mis Colmenas</h1>
          <p class="lead text-muted">Agregá con el boton tus colmenas para poder acceder a ellas facilmente. Podrás visualizar la actividad de sus sensores y controlar cuando cosechar. Es importante cargar los datos bien!</p>
          <p>
            <a href="#" class="btn btn-primary my-2" data-toggle="modal" data-target="#modal_carga">Agrega tu Colmena</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            @foreach ($colmenas as $colmena)

              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" src="{{ asset('img/panal.jpg') }}" style="height: 225px; width: 100%; display: block;" alt="Card image cap">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <p class="card-text"><strong>Nombre: {{ $colmena->nombre_colmena }}</strong><br><strong>Codigo: {{ $colmena->codigo_colmena }}</strong></p>
                      <a class="mb-4" href="#" data-toggle="modal" data-target-id="{{ $colmena->id }}" data-target-nombre="{{ $colmena->nombre_colmena }}" data-target-codigo="{{ $colmena->codigo_colmena }}" data-target-activa="{{ $colmena->activa }}" data-target="#modal_config"><small class="text-muted"><i class="material-icons" style="font-size: 28px;" title="Config">settings</i></small></a>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-info" href="{{ route('dashboard', $colmena->codigo_colmena) }}">Visualizar</a>
                        <a class="btn btn-sm btn-outline-danger" href="{{ route('control', $colmena->codigo_colmena) }}">Control</a>
                      </div>
                      @if( $colmena->activa == true)
                        <small class="text-muted"><i class="material-icons" style="color: #00FF00; font-size: 28px;" title="Activa">hive</i></small>
                      @elseif ( $colmena->activa == false )
                        <small class="text-muted"><i class="material-icons" style="color: #ff5858; font-size: 28px;" title="Inactiva">hive</i></small>
                      @endif
                      
                    </div>
                  </div>
                </div>
              </div>

            @endforeach

          </div>
        </div>
      </div>
</div>
@endsection

@section('scripts')

    <script>

        function deleteColmenaConfig(id) {
          
          Swal.fire({
            title: 'Está seguro?',
            text: "No podra deshacer la acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borrar!'
          }).then((result) => {
            if (result.isConfirmed) {
              
              $.post("{{ route('deleteColmena') }}",
               { "_token": "{{ csrf_token() }}", "id":id }, 
               function(data, status) {
                  console.log(data);
                  if ( status == 'success' )
                  {
                    window.location.replace("{{ route('redirectSuccess') }}");
                  }
                  
                });
            }
          })
        };

        function openModalCarga() {
            $('#modal_carga').modal('show');
        };

        function openModalConfig() {
            $('#modal_config').modal('show');
        };
        
        $(document).ready(function () {
          $("#modal_config").on("show.bs.modal", function (e) {
            var id_conf = $(e.relatedTarget).data('target-id');
            var nombre_conf = $(e.relatedTarget).data('target-nombre');
            var codigo_conf = $(e.relatedTarget).data('target-codigo');
            var activa_conf = $(e.relatedTarget).data('target-activa');
            $('#codigoConf').val(codigo_conf);
            $('#nombreConf').val(nombre_conf);
            $('#activaConf').val(activa_conf);
            $('#idConf').val(id_conf);
            $('#deleteBtn').val(id_conf);
          });
        });

    </script>

@endsection

