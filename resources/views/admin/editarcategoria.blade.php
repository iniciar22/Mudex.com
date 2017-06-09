@extends('layouts.admin')

@section('conteudo')

  <h2>Alterar Categoria</h2>

    {!!Form::model($categorias, array('url'=> array('admin/categorias/salvar'))) !!}

        <div class="form-group">
            
            {{Form::label('nome','Nome da Categoria')}}
            {{Form::text('nome', null, array('placeholder'=>'', 'class'=>'form-control'))}}<br>
            {!! Form::hidden('id') !!}<br>

            
            {!! Form::label('categoria_id', 'Categoria Pai') !!}
            {!! Form::select('categoria_id', $categorias->lists('nome','id')) !!}<br><br>

             
            {{Form::Button('Confirmar', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
            <a href="{{url('admin/categoria')}}"  class="btn btn-default">Cancelar</a>
        </div>
    {!! Form::close() !!}

    



@stop