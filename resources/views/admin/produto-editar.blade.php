@extends('layouts.admin')
@extends('layouts.master')

@section('conteudo')
<h2>Editar Produto {{ $produto->id }} </h2>

    {!! Form::model($produto, array('url' => array('admin/produto/salvar'))) !!}
    <p>

        {!! Form::hidden('nome_pai','null',['id' => 'nome_pai']) !!}

        {!! Form::label('nome', 'Nome do Produto') !!}<br/><br>
        {!! Form::text('nome',null, ['class' => 'form-control']) !!}<br>

        {!! Form::label('categoria_id', 'Categoria') !!}<br>
        {{ Form::select('categoria_id',$categoria, null,['placeholder' => 'Selecione', 'class' => 'form-control'], array(['nome'])) }}<br><br>

        {!! Form::label('marca_id', 'Selecione a marca') !!}
        {{ Form::select('marca_id',$marca, null,['placeholder' => 'Selecione', 'class' => 'form-control'], array(['nome'])) }}<br><br>

        {!! Form::label('descricao', 'Descrição do Produto') !!}
        {!! Form::textarea('descricao',null, ['class' => 'form-control']) !!}<br><br>

        {!! Form::label('preco_venda', 'Preço do produto') !!}
        {!! Form::text('preco_venda',null, ['class' => 'form-control']) !!}<br><br>

        {!! Form::label('image', 'Adicione uma imagem', ['class' => 'control-label']) !!}
        {!! Form::file('image',['class' => 'file']) !!}<br>

        {!! Form::label('imagem_nome', 'Descrição da imagem', ['class' => 'control-label']) !!}
        {!! Form::text('imagem_nome', null, ['class' => 'form-control']) !!}<br>

        {!! Form::label('qtde_estoque', 'Quantidade em Estoque') !!}
        {!! Form::number('qtde_estoque', null, ['class' => 'form-control']) !!}<br>

        {!! Form::label('destacado', 'Deseja deixar o produto em destaque') !!}
        {!! Form::checkbox('destacado', 't', false); !!}<br><br>
        
        {!! Form::hidden('id') !!}<br>
        {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
    </p>
    {!! Form::close() !!}

@stop