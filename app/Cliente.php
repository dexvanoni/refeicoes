<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

  protected $primaryKey = 'id';
  
  protected $fillable = ['nome_completo', 'rua', 'numero', 'bairro', 'email', 'tel', 'empresa'];

  public function pedidos()
  {
    //return $this->hasMany('App\Pedido', 'pedidos', 'cliente_id', 'id')->orderBy('pago');
    return $this->hasMany('App\Pedido', 'cliente_id', 'id');
  }

}
