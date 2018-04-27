<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Notify;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function store(Request $request)
    {

      $this->validate($request, [
          'name'=>'required|max:40',
      ]);

      $category = new Category;
      $category->name = $request->name;
      $category->save();

      Notify::success('', $title = 'Categoria creada correctamente', $options = []);

      return redirect()->route('category.index');
    }

    public function edit(Category $category, Request $request)
    {
      return view('category.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
      $this->validate($request, [
          'name'=>'required|max:40',
      ]);

      $category = new Category;
      $category->name = $request->name;
      $category->save();

      Notify::success('', $title = 'Categoria editada correctamente', $options = []);

      return redirect()->route('category.index');
    }
    public function delete(Category $category, Request $request)
    {
      $category->delete();

      Notify::success('', $title = 'Datos eliminados correctamente', $options = []);
      return redirect()->route('category.index');

    }
}
