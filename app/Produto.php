<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedidos;
class Produto extends Model
{
  protected $primaryKey = 'id';

  protected $fillable = ['nome', 'valor'];

  /*public function pedidos()
  {
      return $this->belongsToMany(Pedido::class);
  }*/
}
