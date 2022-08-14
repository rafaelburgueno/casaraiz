
@if(session('exito'))
    <div class="container position-fixed mt-2">
        <div class="float-right">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Exito!</strong> {{session('exito')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif