@extends('layouts.app')

@section('content')

    @if(empty($empresas))

        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado
        </div>

    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                            <div class="card-header">
                                <a href="/home">Home</a> | Lista de Empresas
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <th>Empresa</th>
                                    <th>E-mail</th>
                                    <th>Logo</th>
                                    <th>Website</th>
                                    <th colspan="2"></th>
                                    @foreach($empresas as $emp)
                                        <tr>
                                            <td> {{$emp->nome}} </td>
                                            <td> {{$emp->email}} </td>
                                            <td>
                                                <img height="40" width="50" src="{{url('storage/'.$emp->logo)}}" alt="">
                                            </td>
                                            <td> {{$emp->website}} </td>
                                            <td>
                                                <a href="/empresas/delete/{{$emp->id}}">
                                                    <span class="fas fa-trash " aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/empresas/show/{{$emp->id}}">
                                                    <span class="fas fa-edit" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href = '/home';">
                                  Voltar
                                </button>
                                <button type="button" class="btn btn-secondary" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="location.href = '/empresas/novo';">
                                  Novo
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
