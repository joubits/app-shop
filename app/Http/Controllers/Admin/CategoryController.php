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
    	$categories = Category::orderBy('name')->paginate(5);
    	return view('admin.categories.index')->with(compact('categories'));
    }

    public function create(Request $request)
    {
    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {

    	$this->validate($request, Category::$rules, Category::$messages);

    	//registrar en bd
    	$category = Category::create($request->only('name','description'));

        if($request->hasFile('image'))
        {
            # guardar img categoria en nuestro proyecto
            $file = $request->file('image');
            $path = public_path().'/images/categories';
            $filename = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path,$filename);
            # update category
            if($moved){
                $category->image = $filename;
                $category->save();
            }

        }
        $notification = 'Categoria creada exitosamente';
        return redirect('/admin/categories')->with(compact('notification'));
    	
    }

    public function edit(Category $category)
    {
    	return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category)
    {
    	//validar datos
    	$this->validate($request, Category::$rules, Category::$messages);

    	//update en bd
    	$category->update($request->only('name','description')); //mass assigment

    	// $category = Category::find($id);
    	// $category->name = $request->input('name');
    	// $category->description = $request->input('description');

        if($request->hasFile('image'))
        {
            # guardar img categoria en nuestro proyecto
            $file = $request->file('image');
            $path = public_path().'/images/categories';
            $filename = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path,$filename);
            # update category
            if($moved){
                //se elimina imagen anterior...
                $previous_path = $path . '/'. $category->image;
                $category->image = $filename;
                $saved = $category->save();

                if($saved)
                    File::delete($previous_path);


            }

        }

    	// $category->save();
    	$notification = 'Categoria actualizada exitosamente';
    	return redirect('/admin/categories')->with(compact('notification'));
    	
    }

    public function destroy(Category $category)
    {
    	
    	$category->delete();

    	$notification = 'Categoria eliminada correctamente';
    	return redirect('/admin/categories')->with(compact('notification'));


    }
}
