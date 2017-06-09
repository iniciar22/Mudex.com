<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Produto;




class ProdutoController extends Controller {

    function getProdutoDetalhes($id) {
        $models['produto'] = Produto::find($id);
        return view('frente.produto-detalhes', $models);
    }

    function getBuscar(Request $request) {
        $this->validate($request, [
            'termo-pesquisa' => 'required|filled'
                ]
        );

        $termo = $request->get('termo-pesquisa');

        $produtos = Produto::where('nome', 'LIKE', '%' . $termo . '%')
                ->paginate(10);
        //$produtos->setPath('buscar/'.$termo);
        $models['produtos'] = $produtos;
        $models['termo'] = $termo;
        return view('frente.resultado-busca', $models);
    }

    public function listar(){
        $produtos= Produto::all();

        return view('admin.produto')->with('produtos',$produtos);
    }

    public function novo(){
        return view('admin.form_produto');
    }


    public function adiciona(Request $r){

        $this->validate($r, [
            'nome' => 'required|min:2|unique:produtos',
            'descricao' => 'required|min:3|unique:produtos',
            'qtde_estoque' => 'required|min:1|numeric',
            'preco_venda' => 'required|min:1|numeric',
            'imagem_nome' => 'required',
        ]);


        Produto::create($r->input());
        return redirect('admin/produto') ->with( 'mensagem-sucesso', 'Incluído com sucesso!');


    }

    public function alterar(Produto $produto,$id){
        //pesquisa a marca pelo id

        $produto=$produto->find($id);


        if($produto !=null){
            $data['produtos']=$produto;

            return view('/admin.editarproduto', $data);
        }
        else{
            return redirect('admin/produto');
        }
    }

    public function salvar(Request $request, Produto $produto){
        //verifica se existe o id para a alteracao

        if($request->has('id')){
            $p= $produto->find($request->get('id'));
            if($p !=null){
                 $this->validate($request, [
                    'nome' => 'required|min:1|',
                    'descricao' => 'required|min:3|unique:produtos',
                    'qtde_estoque' => 'required|min:1|numeric',
                    'preco_venda' => 'required|min:1|numeric',
                    'imagem_nome' => 'required',
                  ]);
                $p->update($request->all());
                
                return redirect('admin/produto')->with('mensagem-sucesso','Produto ' . 'Alterado com Sucesso');
            }


                       

        }

        $produtos->create($request->all());
        return redirect('admin/produto');
    }

    public function excluir(Produto $produto,$id){

        $produto=$produto->find($id);

        if($produto !=null){
            $data['produtos']=$produto;
            return view('admin.excluir_produto', $data);
        }

        else{
            return redirect('admin/produto');
        }
      
    }

    public function destroy(Request $request, Produto $produto){
        if($request->has('id')){
            $produtos= $produto->find($request->get('id'));

            if($produtos !=null){
               
                $produtos->delete($request->all());
                
                return redirect('admin/produto')->with('mensagem-sucesso','Produto ' . ' Excluido com Sucesso');
            }

  

        }
         return redirect('admin/produto');

    }


}
