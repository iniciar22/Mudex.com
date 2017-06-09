@extends('layouts.frente-loja')

@section('conteudo')


	<h1>Nova Categoria</h1>

	{{Form::open(array('url'=>'admin/categoria/adiciona', 'method'=>'POST'), array('role'=> 'form'))}}
	
		<div class="form-group">
			
			{{Form::label('nome','Nome da Categoria')}}
			{{Form::text('nome', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))}}<br>

			 {!! Form::label('categoria_id', 'Categoria') !!}
  			

  			{!! Form::select('categoria_id', $categorias->lists('nome','id','null')) !!}<br>
  					

			{{Form::Button('Cadastrar', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
			<a href="{{url('admin/categoria')}}" class="btn btn-default ">Cancelar</a>
		</div>
	{{Form::close()}}











@stop