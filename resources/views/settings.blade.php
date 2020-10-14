@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>Current table rendering side: <span id="tableRenderingSide"></span></p>

                    @include('partials.serverSideRenderBtn')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

<script>

    function getSide(){
        side = sessionStorage.getItem("serverSideRender");
        return (side == 1) ? "Server Side" : "Client Side";
    }

    function showToSettings(){
        $("#tableRenderingSide").html(getSide());
    }

    showToSettings();

</script>

@endsection
