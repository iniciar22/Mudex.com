@extends('layouts.frente-loja')

@section('conteudo')
<h2>Finalizar compra</h2>
<table class="table">
    <tr>
        <td>
            <h4>
                {{$itens->count()}} produto(s) no carrinho
            </h4>
        </td>
        <td class="text-right">
            Total
        </td>
        <td>
            <h4 class="text-right text-danger">
                {{number_format($total,2,',','.')}}
            </h4>
        </td>
        <td>
            @if (Auth::guest())
            <a href="{{route('carrinho.finalizar-compra')}}"
               class="btn btn-success pull-right">
                Faça seu login para finalizar a compra
            </a>
            @else
             <a href="{{route('pagseguro.checkout')}}" class="btn btn-primary pull-right">
                Finalizar Pagamento
            </a>
            @endif
        </td>
    </tr>
</table>
@stop