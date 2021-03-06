@extends('layouts.frente-loja')

@section('conteudo')
<div class='col-sm-12'>
    <div class="page-header text-muted">
        {{count($produtos)}} produtos em destaque
    </div>
</div>

@foreach($produtos as $produto)
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{route('imagem.file',$produto->imagem_nome)}}" alt="{{$produto->imagem_nome}}" >
        <div class="caption">
            <h3>{{$produto->nome}}</h3>
            <h4 class="text-muted">{{$produto->marca->nome}}</h4>
            <p>{{str_limit($produto->descricao,100)}}</p>
            <p><a href="{{route('produto.detalhes', $produto->id)}}" class="btn btn-primary" role="button">Detalhes</a></p>
        </div>
    </div>
</div>
@endforeach
@stop
