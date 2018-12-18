<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class GestaoController extends Controller
{
    public function index(){
      $hoje = Carbon::now();
      return view('admin.gestao', compact('hoje'));
    }
}
