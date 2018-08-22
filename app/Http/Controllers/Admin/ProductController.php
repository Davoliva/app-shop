<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//listado
    }

    public function create()
    {
        return view('admin.products.create');//formulario de registro
    }
    public function store(Request $request)
    {
        //registra el nuevo producto en el BD
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save(); //INSERT

        return redirect('/admin/products');
    }


    public function edit($id)
    {
        /** */
        //return "Mostrar aquí el formulario de edición para el producto con id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));//formulario de registro
    }
    public function update(Request $request, $id)
    {
        //Busca el id y registra los datos actualizados
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->save(); //UPDATE

        return redirect('/admin/products');
    }

    public function destroy($id)
    {
        //Busca el id y elimina
        $product = Product::find($id);
        $product->delete(); //DELETE
        return back();
    }
}
