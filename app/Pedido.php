<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Produto;
use App\Cliente;
class Pedido extends Model
{
   protected $table = 'pedidos';
   protected $primaryKey = 'id';
   protected $dates = ['created_at', 'updated_at'];

   protected $fillable = ['produtos', 'quantidade', 'total', 'pago', 'cliente_id'];

  public function clientes()
    {
      return $this->belongsTo(Cliente::class, 'cliente_id','id'); // idModele
        //return $this->belongsTo('App\Cliente');
    }

    /*public function produtos()
      {          
        
      }*/
}
