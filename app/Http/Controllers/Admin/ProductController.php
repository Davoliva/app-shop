<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//listado
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));//formulario de registro
    }
    public function store(Request $request)
    {
        //Validar
        $menssage = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del productp debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio valido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $menssage);
        //registra el nuevo producto en el BD
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); //INSERT

        return redirect('/admin/products');
    }


    public function edit($id)
    {
        /** */
        //return "Mostrar aquí el formulario de edición para el producto con id $id";
        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories'));//formulario de registro
    }
    public function update(Request $request, $id)
    {
        //Validar
        $menssage = [
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del productp debe tener al menos 3 caracteres.',
            'description.required' => 'La descripción corta es un campo obligatorio.',
            'description.max' => 'La descripción solo admite hasta 200 caracteres.',
            'price.required' => 'Es obligatorio definir un precio para el producto.',
            'price.numeric' => 'Ingrese un precio valido.',
            'price.min' => 'No se admiten valores negativos.'
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $menssage);

        //Busca el id y registra los datos actualizados
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
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
