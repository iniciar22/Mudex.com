@extends('layouts.admin')

@section('conteudo')

    <a href="marca/novo" class="btn btn-primary">Adicionar Nova</a><br><br>

    @if (Session::has('mensagem-erro'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
    <div class='alert alert-danger'>
        {{Session::get('mensagem-erro')}}
    </div>
    @endif
    @if (Session::has('mensagem-sucesso'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-sucesso -->
    <div class='alert alert-primary'>
        {{Session::get('mensagem-sucesso')}}
    </div>
    @endif

    <h1>Lista das Marcas</h1><br>

    <table class="table table-hover ">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Ações</td>
    </tr>
    @foreach ($marcas as $m)
    <tr>
        <td>{{$m->id}}</td>
        <td>{{$m->nome}}</td>
        <td>
            <a class="btn btn-default" href="{{ url('admin/marcas/editar/'.$m->id) }}">Editar</a>
            <a class="btn btn-danger" href="{{ url('admin/marcas/excluir/'.$m->id) }}">Excluir</a>
        </td>

    </tr>
    @endforeach
    </table>

@stop