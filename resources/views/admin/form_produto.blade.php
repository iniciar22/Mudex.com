@extends('layouts.frente-loja')

@section('conteudo')


	<h1>Novo Produto</h1>

	{{Form::open(array('url'=>'admin/produto/adiciona', 'method'=>'POST'), array('role'=> 'form'))}}
	
		<div class="form-group">
			
			{{	Form::label('nome','Nome do Produto')	}}
			{{	Form::text('nome', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))	}}<br>

			{{ 	Form::label('categoria', 'Categoria') }}
  			{{ Form::select('categoria_id', $categorias->lists('nome','id')) }}<br><br>

  			{{ 	Form::label('marca', 'Marca') }}
  			{{ Form::select('marca_id', $marcas->lists('nome','id')) }}<br><br>

			{{	Form::label('descricao','Descrição do Produto')}}
			{{	Form::textarea('descricao', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))	}}<br>

			{{	Form::label('qtde_estoque','Quantidade')}}
			{{	Form::text('qtde_estoque', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))	}}<br>

			{{	Form::label('preco_venda','Preço de Venda')	}}
			{{	Form::text('preco_venda', null, array('placeholder'=>'Digite aqui', 'class'=>'form-control'))	}}<br>
			 
			{{ 	Form::label('destacado', 'Produto Destacado') }}
  			{{	Form::checkbox('destacado', '1')	}}<br>

  			{{	Form::label('imagem_nome', 'Imagem') }}
  			{{	Form::file('imagem_nome', null, array('placeholder'=>'', 'class'=>'form-control'))	}}<br>

  		
			{{Form::Button('Cadastrar', array('type'=>'submit', 'class'=>'btn btn-primary '))}}
			<a href="{{url('admin/produto')}}"  class="btn btn-default">Cancelar</a>
		</div>
	{{Form::close()}}











@stop