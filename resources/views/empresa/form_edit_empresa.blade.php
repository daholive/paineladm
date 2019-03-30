@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Empresa</div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="" action="/empresas/edit" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{ $empresa->id }}">
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <input name="nome" class="form-control" value="{{ $empresa->nome }}">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input name="email" class="form-control" value="{{ $empresa->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Logo</label>
                                <img height="40" width="50" src="{{url('storage/'.$empresa->logo)}}" alt="">
                                <input type="hidden" name="logo" value="{{$empresa->logo}}">
                            </div>
                            <div class="form-group">
                                <label for="">Website</label>
                                <input name="website" class="form-control" value="{{ $empresa->website }}">
                            </div>

                            <button type="submit" name="button" class="btn btn-primary">Salvar</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
