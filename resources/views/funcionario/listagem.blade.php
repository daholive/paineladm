@extends('layouts.app')

@section('content')

    @if(empty($funcionarios))

        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado
        </div>

    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                            <div class="card-header">
                                <a href="/home">Home</a> | Lista de Funcionários
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                    <th>Empresa</th>
                                    <th colspan="2"></th>
                                    @foreach($funcionarios as $func)
                                        <tr>
                                            <td> {{$func->nome}} </td>
                                            <td> {{$func->email}} </td>
                                            <td> {{$func->telefone}} </td>
                                            <td> {{$func->cpf}} </td>
                                            <td> {{$func->empresa}}
                                            </td>
                                            <td>
                                                <a href="/funcionarios/delete/{{$func->id}}">
                                                    <span class="fas fa-trash " aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/funcionarios/show/{{$func->id}}">
                                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href = '/home';">
                                  Voltar
                                </button>
                                <button type="button" class="btn btn-secondary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href = '/funcionarios/novo';">
                                  Novo
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
