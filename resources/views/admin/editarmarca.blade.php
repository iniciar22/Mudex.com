@extends('layouts.admin')

@section('conteudo')

  <h2>Alterar Marca</h2>

    {!!Form::model($marcas, array('url'=> array('admin/marcas/salvar'))) !!}

        <div class="form-group">
            
            {{Form::label('nome','Nome da Marca')}}
            {{Form::text('nome', null, array('placeholder'=>'', 'class'=>'form-control'))}}<br>
            {!! Form::hidden('id') !!}<br>
            {{Form::Button('Confirmar', array('type'=>'submit', 'class'=>'btn btn-primary'))}}
            <a href="{{url('admin/marca')}}" class="btn btn-default">Cancelar</a>
        </div>
    {!! Form::close() !!}



@stop