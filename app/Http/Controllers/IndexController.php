<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks; 


class IndexController extends Controller
{
    public function __invoke() { 
         $site_settings = [
            'title' => setting('site.title'),
            'description' => setting('site.description')
        ];

        return view('tasks', [
            'site_settings' => $site_settings
        ]);
   }
}
