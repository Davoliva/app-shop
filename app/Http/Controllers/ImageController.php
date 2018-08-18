<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductImage;
use File;
// use Illuminate\Support\Facades\Request;

class ImageController extends Controller
{
     public function index($id)
     {
         $product = Product::find($id);
         $images = $product->images;
         return view('admin.products.images.index')->with(compact('product', 'images'));
     }
 
     public function store(Request $request, $id)
     {
         //Guardar la imagen en nuestro proyecto
         $file = $request->file('photo');
         $path = public_path() . '/images/products';
         //se asigna un nombre unico (numero y fecha) para que las imagenes no se sobre escriban
         $fileName = uniqid() . $file->getClientOriginalName();
         $moved = $file->move($path, $fileName);
         
         //crear un registro en la tabla producto_imagenes
         if($moved)
         {
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = false;
            $productImage->product_id = $id;
            $productImage->save();
         }
        
         return back();
     }
 
     public function destroy(Request $request, $id)
     {
         //Eliminar el archivo
         $productImage = ProductImage::find($request->image_id);
         if(substr($productImage->image, 0, 4) === 'http')
         {
            $deleted = true;
         }else
         {
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            $deleted = File::delete($fullPath);
         }
         //Eliminar el registro de la imagen en la base de datos
         if($deleted)
         {
             $productImage->delete();
         }

         return back();
     }
}
