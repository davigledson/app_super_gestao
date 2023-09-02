<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //
    public function Principal(){
        return view('site.principal'); //site/principal - tbm dar certo
    }
}
