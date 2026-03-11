<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog()
    {
        $catalog = Catalog::all();
        return view('static.catalog')->with('catalog', $catalog);
    }

    public function show($id) 
    {
        $catalogss = Catalog::findOrFail($id);
        return view('static.show')->with('catalogss', $catalogss);
    }
}
