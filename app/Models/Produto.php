<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;
use Shoppvel\Models\Produto;

class Produto extends Model {
    public function marca() {
        return $this->belongsTo(Marca::class);
    }
    
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
    
    public function scopeDestacado($query) {
        return $query->where('destacado', TRUE);
    }

    protected $table='produtos';
    protected $fillable= array('nome','descricao','avaliacao_qtde','avaliacao_total','qtde_estoque','preco_venda','destacado','imagem_nome','categoria_id','marca_id');




    
}
