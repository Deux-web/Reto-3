<div class="col-12 bg-light my-1 rounded-sm p-3 form-group order-4 order-md-3" style="height: max-content">
    <div class="col-md-9 col-12 d-flex justify-content-between px-0">
        <h1 class="mb-0">Comentarios</h1>
        <i id="botonDatosComentarios"
           class="fas fa-arrow-down col-2 d-block d-md-none d-flex justify-content-center align-items-center"></i>
    </div>
    <div id="datosComentarios" class="colapsarDiv">
        <form action="{{route('comentario.store', $incidencia->id)}}" method="POST" class="mb-3">
            @csrf
            <h4><label for="comentario_nuevo">Nuevo comentario: </label></h4>
            <div class="row">
                <div class="col-md-9 col-12 mb-2 mb-md-0">
                        <textarea name="comentario_nuevo" id="comentario_nuevo" rows="3" class="form-control"
                                  style="resize: none;"></textarea>
                </div>
                <div class="col-md-3 col-12 d-flex align-items-start justify-content-center">
                    <input type="submit" value="Guardar comentario"
                           class="btn btn-primary py-md-3 w-md-auto w-100">
                </div>
            </div>
        </form>

        @forelse($comentarios as $comentario)
            <div class="px-3 py-1 border rounded-sm bg-white mb-1">
                <div class="row">
                    <div class="col-12 py-2">
                        <h5 class="d-inline">Comentario de {{$comentario->autor}}</h5>
                        <p class="d-inline float-right">{{$comentario->created_at}}</p>
                        <p class="comentario mb-1">{{$comentario->mensaje}}</p>
                        <span class="float-right text-secondary"></span>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <div class="col-12 py-2 row">
                    <h5>No hay comentarios !</h5>
                </div>
            </div>
        @endforelse
    </div>
</div>
