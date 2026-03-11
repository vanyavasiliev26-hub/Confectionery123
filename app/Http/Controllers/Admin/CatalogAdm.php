<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogAdm extends Controller
{
    public function CatalogHome()
    {
        $catalog = Catalog::all();
        return view('admin.catalog')->with('catalog', $catalog);
    }

    public function create()
    {
        return view('admin.catalog-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            return back()->with('error', 'Изображение обязательно для загрузки');
        }

        Catalog::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imageName
        ]);

        return redirect()->route('admin.AdminCatalog')->with('success', 'Товар успешно добавлен');
    }

    public function edit($id)
    {
        $item = Catalog::findOrFail($id);
        return view('admin.catalog-edit')->with('item', $item);
    }

    public function update(Request $request, $id)
    {
        $item = Catalog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ];

        if ($request->hasFile('image')) {
            if ($item->image && file_exists(public_path('images/' . $item->image))) {
                unlink(public_path('images/' . $item->image));
            }
            
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $item->update($data);

        return redirect()->route('admin.AdminCatalog')->with('success', 'Товар успешно обновлен');
    }

    public function destroy($id)
    {
        $item = Catalog::findOrFail($id);
        
        if ($item->image && file_exists(public_path('images/' . $item->image))) {
            unlink(public_path('images/' . $item->image));
        }
        
        $item->delete();

        return redirect()->route('admin.AdminCatalog')->with('success', 'Товар успешно удален');
    }
}