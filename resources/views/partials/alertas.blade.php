
@if(session('exito'))
    <div class="container position-fixed mt-2 alerta">
        <div class="float-right">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito! </strong> {{session('exito')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

@if(session('no_permitido'))
    <div class="container position-fixed mt-2 alerta">
        <div class="float-right">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>No Permitido! </strong> {{session('no_permitido')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif


<script>
    $(document).ready(function(){
        $(".alerta").fadeOut(15000);
    });
</script>