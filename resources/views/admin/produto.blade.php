@extends('layouts.admin')

@section('conteudo')



<a class="btn btn-primary" href="{{ url('admin/produtos/novo') }}">Adicionar Novo</a>
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
    
<h1>Lista dos Produtos</h1><br>

 <table class="table table table-hover">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Categoria</td>
        <td>Marca</td>
        <td>Descrição</td>
        <td>Avaliação</td>
        <td>Estoque</td>
        <td>Preço</td>
        <td>Destacado</td>
        <td>Imagem</td>
        <td>Ações</td>
    </tr>
    @foreach ($produtos as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->nome}}</td>
        <td>{{$p->categoria->nome}}</td>
        <td>{{$p->marca->nome}}</td>
        <td>{{str_limit($p->descricao,100)}}</td>
        <td>{{$p->avaliacao_total}}</td>
        <td>{{$p->qtde_estoque}}</td>
        <td>{{$p->preco_venda}}</td>
        <td>{{$p->destacado}}</td>
        <td><img src="{{route('imagem.file',$p->imagem_nome)}}" width="100px" alt="{{$p->imagem_nome}}"></td>
     
        <td>
        	<a class="btn btn-default" href="{{ url('admin/produtos/editar/'.$p->id) }}">Editar</a>
            <a class="btn btn-danger" href="{{ url('admin/produtos/excluir/'.$p->id) }}">Excluir</a>
        </td>
        
       
    </tr>
    @endforeach
    </table>

@stop