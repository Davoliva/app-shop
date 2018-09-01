<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));//listado
    }

    public function create()
    {
        return view('admin.categories.create');//formulario de registro
    }
    public function store(Request $request)
    {
    
        $this->validate($request, Category::$rules, Category::$messages);

        //registra el nuevo producto en el BD
        $category = Category::create($request->only('name', 'description')); //asignación masiva/ Mass assigment

        if($request->hasFile('image')){
            //Guardar la imagen en nuestro proyecto
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            //se asigna un nombre unico (numero y fecha) para que las imagenes no se sobre escriban
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            //actualiza la categoria
            if($moved)
            {
                $category->image = $fileName;
                $category->save(); //UPDATE
            }
        }

        return redirect('/admin/categories');
    }


    public function edit(Category $category)
    {
        /** */
        return view('admin.categories.edit')->with(compact('category'));//formulario de registro
        
    }
    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        //Busca el id y registra los datos actualizados
        $category->update($request->only('name','description'));

        if($request->hasFile('image')){
            //Guardar la imagen en nuestro proyecto
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            //se asigna un nombre unico (numero y fecha) para que las imagenes no se sobre escriban
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            //actualiza la categoria
            if($moved)
            {
                $previusPath = $path .'/'. $category->image;
                $category->image = $fileName;
                $saved = $category->save(); //UPDATE

                if($saved)
                    File::delete($previusPath);
            }
        }

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        //Busca el id y elimina
        $category->delete(); //DELETE
        return back();
    }
}
