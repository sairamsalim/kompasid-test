<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
class CategoryController extends GenericController
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete')->only(['index', 'show']);
        $this->middleware('permission:category-create')->only(['create', 'store']);
        $this->middleware('permission:category-edit')->only(['edit', 'update']);
        $this->middleware('permission:category-delete')->only(['delete']);
    }
    //list category
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('categories.index',compact('categories'))->with('i');
    }
    //create category
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
        ]);
        $input = $request->all();
        $category = Category::create([
            'title' => $input['title'],
        ]);
        return redirect()->route('categories.index')
                        ->with('success','Category created successfully.');
    }
    //show specified category
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }
    //edit specified category
    public function edit(Category $category)
    {
       return view('categories.edit',compact('category'));
    }
    public function update(Request $request, Category $category)
    {
         request()->validate([
            'title' => 'required',
        ]);
    
        $input = $request->all();
        $category->where('id', $category->id)
        ->update([
            'title' => $input['title'],
        ]);
    
        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
    
        return redirect()->back()
                        ->with('success','Category deleted successfully');
    }
}