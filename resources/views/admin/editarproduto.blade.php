@extends('layouts.admin')

@section('conteudo')

  <h2>Alterar Produto</h2>
  <div class="form-group">

    {!!Form::model($produtos, array('url'=> array('admin/produtos/salvar'),'files' => true)) !!}

    

    {{Form::label('nome','Nome do Produto')}}
    {{Form::text('nome', null, array('class'=>'form-control'))}}<br>

    {{  Form::label('descricao','Descrição do Produto')}}
            {{  Form::textarea('descricao', null, array('placeholder'=>'Digite a descrição do Produto', 'class'=>'form-control'))   }}<br>

            {{  Form::label('qtde_estoque','Quantidade em Estoque')}}
            {{  Form::text('qtde_estoque', null, array('placeholder'=>'Digite a Quantidade em Estoque', 'class'=>'form-control'))   }}<br>

            {{  Form::label('preco_venda','Preço de Venda') }}
            {{  Form::text('preco_venda', null, array('placeholder'=>'Digite o Preço da Venda', 'class'=>'form-control'))   }}<br>
             
            {{  Form::label('destacado', 'Produto Destacado') }}
            {{  Form::checkbox('destacado', '1')    }}<br>

            {{  Form::label('imagem_nome', 'Imagem') }}
            {{  Form::file('imagem_nome')  }}<br>

            {{  Form::label('categoria', 'Categoria') }}
            {{  Form::select('categoria_id', $categorias->lists('nome','id')) }}<br>
            <br>           
            {{  Form::label('marca', 'Marca') }}
            {{ Form::select('marca_id', $marcas->lists('nome','id')) }}<br><br>

    {!! Form::hidden('id') !!}<br>
     
    {{Form::Button('Confirmar', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
        <a href="{{url('admin/produto')}}" class="btn btn-default">Cancelar</a>

  </div>
  {!! Form::close() !!}      


@stop