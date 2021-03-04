<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class suporteController extends Controller
{
    public function clienteFeedbackView(){
        return view('painel.feedback.cliente.feedback');
    }
    public function empresaFeedbackView(){
        return view('painel.feedback.empresa.feedback');
    }
    public function clienteHelpDeskView(){
        return view('painel.suporte.cliente.falecom');
    }
    public function empresaHelpDeskView(){
        return view('painel.suporte.empresa.falecom');
    }
}
