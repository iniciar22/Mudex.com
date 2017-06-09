@extends('layouts.admin')
@extends('layouts.master')

@section('conteudo')
<h2>Novo Produto</h2>

	{!! Form::open(array('url' => 'admin/produto/salvar')) !!}
	<p>

		{!! Form::label('nome', 'Nome do Produto') !!}
		{!! Form::text('nome', null, ['class' => 'form-control']) !!}<br>
		{!! Form::label('marca_id', 'Selecione a Marca') !!}
		{{ Form::select('marca_id',$marca, null,['placeholder' => 'Selecione', 'class' => 'form-control'], array(['nome'])) }}<br><br>
		{!! Form::label('categoria_id', 'Selecione a Categoria') !!}<br>
		{{ Form::select('categoria_id',$categoria, null,['placeholder' => 'Selecione', 'class' => 'form-control'], array(['nome'])) }}<br><br>
		{!! Form::label('preco_venda', 'Preço do Produto') !!}
		{!! Form::number('preco_venda', null, ['class' => 'form-control']) !!}<br>
		{!! Form::label('descricao', 'Descrição') !!}
		{!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}<br>
		{!! Form::label('imagem', 'Inclua uma Imagem') !!}
		{!! Form::file('imagem') !!}<br>
		{!! Form::label('imagem_nome', 'Nome da Imagem') !!}
		{!! Form::text('imagem_nome', null ,['class' => 'form-control']) !!}<br>

		{!! Form::label('qtde_estoque', 'Quantidade em Estoque') !!}
		{!! Form::number('qtde_estoque', null, ['class' => 'form-control']) !!}<br>
		{!! Form::label('destaque', 'Marque a Caixa Para Destacar Produto') !!}
		{!! Form::checkbox('destaque', 't', false) !!}<br>


		{!! Form::submit('Cadastrar',['class'=> 'btn btn-default']) !!}
		<a href="{{route('admin.produto')}}" class="btn btn-default"> Cancelar</a>
	</p>
	{!! Form::close() !!}
@stop
 