@extends('layouts.frente-loja')

@section('conteudo')
<h2>Carrinho de compras</h2>
<div class='row'>
    <div class="text-muted col-sm-8">
        {{$itens->count()}} produtos no carrinho
    </div>
    <a href="{{route('carrinho.esvaziar')}}" class="btn btn-warning col-sm-2 pull-right">
        Esvaziar carrinho
    </a>
</div>
<hr/>
<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Produto</th>
            <th class="text-left">Categoria</th>
            <th class="text-left">Marca</th>
            <th class="text-right">Quantidade</th>
            <th class="text-right">Valor Unitário</th>
            <th class="text-right">Total do item</th>
        </tr>
    </thead>
    <tbody>
        @foreach($itens as $item)

        <tr>
            <td>
                <img src="{{route('imagem.file',$item->produto->imagem_nome)}}" alt="{{$item->produto->imagem_nome}}" style="width:150px;" >
            </td>
            <td>
                <a href="{{route('produto.detalhes', $item->produto->id)}}">
                    {{$item->produto->nome}}
                </a>
            </td>
            <td>
              <a href="{{route('produto.detalhes', $item->produto->id)}}">
                    {{$item->produto->categoria->nome}}
                </a> 
            </td>
            <td>
              <a href="{{route('produto.detalhes', $item->produto->id)}}">
                    {{$item->produto->marca->nome}}
                </a> 
            </td>
            <td class="text-right">
                {{$item->qtde}}
            </td>
            <td class="text-right">
                {{number_format($item->produto->preco_venda, 2, ',', '.')}}
            </td>
            <td class="text-right">
                {{number_format($item->produto->preco_venda * $item->qtde, 2, ',', '.')}}
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-right">
                Total
            </td>
            <td>
                <h4 class="text-right text-danger">
                    {{number_format($total,2,',','.')}}
                </h4>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="text-right">
                Finalizar compra
            </td>
            <td>
                @if (Auth::guest())
                    <a href="{{route('carrinho.finalizar-compra')}}"
                        class="btn btn-success pull-right">
                           Faça seu login para finalizar a compra
                    </a>
                @else
                    <a href="{{route('carrinho.finalizar-compra')}}"
                        class="btn btn-success pull-right">
                           Pagar
                    </a>
                @endif
            </td>
        </tr>
    </tfoot>
</table>
@stop