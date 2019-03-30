@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">
                        <a href="/home">Home</a> | <a href="/funcionarios">Lista de Funcionários</a> | Novo Funcionário
                    </div>
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
                        <form class="" action="/funcionarios/edit" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input name="nome" class="form-control" value="{{ old('nome') }}">
                            </div>
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Telefone</label>
                                <input name="telefone" class="form-control" value="{{ old('telefone') }}">
                            </div>
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input name="cpf" class="form-control" value="{{ old('cpf') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <select name="empresa_id" class="form-control" value="{{ old('empresa_id') }}">
                                    <option value="" SELECTED></option>
                                    @foreach($empresas as $emp)
                                        <option value="{{$emp->id}}">{{$emp->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" name="button" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href = '/funcionarios';">
                              Voltar
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
