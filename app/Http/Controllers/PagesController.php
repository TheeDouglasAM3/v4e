<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Projeto legal";
        //return view('pages/index', compact('title'));
        return view('pages/index')->with('title', $title);
    }

    public function about(){
        $data = array(
            'title' => 'Sobre',
            'text' => 'Serviços',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages/about')->with($data);
    }
}
