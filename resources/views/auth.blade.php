@extends('wrapper')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
@section('content')
    <div class="container h-100">
        <div class="row d-flex h-100 align-items-center">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body pb-2">
                        <div class="alert alert-danger" hidden></div>
                        <form id="form" role="form">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <input type="email" class="form-control" name="email" placeholder="E-Mail" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" align="center">
                        <button class="btn btn-primary" form="form" type="submit">Acceder</button>
                    </div>
                </div>
                <div class="mt-2" align="center">
                    <a class="text-white" href="http://www.flex.co.cu">
                        Copyright © Flex
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{ asset('js/auth.js') }}"></script>
@endsection