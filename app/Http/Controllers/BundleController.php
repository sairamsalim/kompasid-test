<?php
namespace App\Http\Controllers;
use App\Blog;
use App\BlogHasCategory;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use DB;
use Illuminate\Support\Facades\Storage;

class BundleController extends GenericController
{
    public function __construct()
    {
        $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete')->only(['index', 'show']);
        $this->middleware('permission:blog-create')->only(['create', 'store']);
        $this->middleware('permission:blog-edit')->only(['edit', 'update', 'workhour', 'update2']);
        $this->middleware('permission:blog-delete')->only(['delete']);
    }
    //list blogs
    public function index()
    {
        $blogs = Blog::join('users', 'users.id', '=', 'blogs.user_id')
            ->orderBy('blogs.created_at', 'desc')
            ->select('users.username', 'blogs.id', 'blogs.title', 'blogs.slug', 'blogs.image')
            ->get();
        return view('blogs.index',compact('blogs'))->with('i');
    }
    //create blog
    public function create()
    {
        $data['user_id'] = app('auth')->user()->id;
        $categories = Category::pluck('title', 'id')->all();
        return view('blogs.create', $data, compact('categories'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|file|mimetypes:image/jpeg,image/png|max:2000',
            'user_id' => 'required',
            'categories' => 'required',
        ]);

        $input = $request->all();

        $filename = date(DATE_ATOM) . rand(1000, 9999) . '.' . $request->file('image')->getClientOriginalExtension();
        $file_upload = Storage::disk('public_uploads')->putFileAs('/images/',$request->file('image'), $filename);

        $blog = Blog::create([
            'title' => $input['title'],
            'slug' => $input['slug'],
            'content' => $input['content'],
            'image' => $filename,
            'user_id' => $input['user_id'],
        ]);
        foreach($input['categories'] as $category_id){
            $category = BlogHasCategory::create([
                'blog_id' => $blog->id,
                'category_id' => $category_id,
            ]);
        }

        return redirect()->route('blogs.index')
                        ->with('success','Blog created successfully.');
    }
    //show specified blog
    public function show(Blog $blog)
    {
        $blogCategory = BlogHasCategory::where('blog_id', $blog->id)->pluck('category_id')->all();
        $categories = Category::whereIn('id', $blogCategory)->pluck('title')->all();
        return view('blogs.show', compact(['blog', 'categories']))->with('i');
    }
    //edit specified blog
    public function edit(Blog $blog)
    {
        $categories = Category::pluck('title','id')->all();
        $blogCategory = BlogHasCategory::where('blog_id', $blog->id)->pluck('category_id')->all();
        return view('blogs.edit', compact(['blog', 'categories', 'blogCategory']));
    }
    //update blog basic info
    public function update(Request $request, $id)
    {
         request()->validate([
            'title' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'file|mimetypes:image/jpeg,image/png|max:2000',
            'categories' => 'required',
        ]);

        $input = $request->all();

        if(isset($input['image'])){
            $filename = date(DATE_ATOM) . rand(1000, 9999) . '.' . $request->file('image')->getClientOriginalExtension();
            $file_upload = Storage::disk('public_uploads')->putFileAs('/images/',$request->file('image'), $filename);
        }
        $image = isset($input['image']) ? $filename : $input['image_old'];

        Blog::where('id', $id)
            ->update([
                'title' => $input['title'],
                'slug' => $input['slug'],
                'content' => $input['content'],
                'image' => $image,
            ]);
        BlogHasCategory::where('blog_id', $id)->delete();
        foreach($input['categories'] as $category_id){
            $category = BlogHasCategory::create([
                'blog_id' => $id,
                'category_id' => $category_id,
            ]);
        }

        return redirect()->route('blogs.index')
                        ->with('success','Blog updated successfully');
    }
    //delete specified blog
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->back()
                        ->with('success','Blog deleted successfully');
    }
}
