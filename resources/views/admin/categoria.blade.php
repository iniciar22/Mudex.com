@extends('layouts.admin')

@section('conteudo')

 <a class="btn btn-primary" href="{{ url('admin/categorias/nova') }}">Adicionar Nova</a>
 <br><br>


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


 <h1>Lista das Categorias</h1><br>

 <table class="table table-hover">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Id_Categoria</td>
        

        <td>AÇÕES</td>
    </tr>
    @foreach ($categorias as $cat)
    <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->nome}}</td>
        <td>{{$cat->categoria_id}}</td>
        
        <td>
            <a class="btn btn-default" href="{{ url('admin/categorias/editar/'.$cat->id) }}">Editar</a>
            <a class="btn btn-danger" href="{{ url('admin/categorias/excluir/'.$cat->id) }}">Excluir</a>
        </td>

    </tr>
    @endforeach
</table>



@stop
