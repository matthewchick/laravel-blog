<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    public function trash() {
        $trashedBlogs = Blog::onlyTrashed()->get();
        //dd($trashedBlogs);
		return view('blogs.trash', compact('trashedBlogs'));
    }

    public function index() {
		// $blogs = Blog::where('status', 1)->latest()->get();
		$blogs = Blog::latest()->paginate(10);
		return view('blogs.index', compact('blogs'));
	}

    public function create() {
        return view('blogs.create');
		//$categories = Category::latest()->get();
		//return view('blogs.create', compact('categories'));
    }

    public function store(Request $request) {
        //dd($request);
        /*
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->save();
        */
        /* "Add [title] to fillable property to allow mass assignment on [App\Blog]." */
        $input = $request->all();
        $blog = Blog::create($input);

        return redirect('/blogs');
    }

    public function show($id) {
		$blog = Blog::findOrFail($id);
		// $blog = Blog::whereSlug($slug)->first();
		return view('blogs.show', compact('blog'));
    }

    public function edit($id) {
		// $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', ['blog' => $blog]);
        /*
		$bc = array();
		foreach ($blog->category as $c) {
			$bc[] = $c->id - 1;
		}

		$filtered = array_except($categories, $bc);

		return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);*/
	}

    public function update(Request $request, $id) {
		// dd($request->all());
		$input = $request->all();
		$blog = Blog::findOrFail($id);
        /*
		if ($file = $request->file('featured_image')) {
			if ($blog->featured_image) {
				unlink('images/featured_image/' . $blog->featured_image);
			}
			$name = uniqid() . $file->getClientOriginalName();
			$name = strtolower(str_replace(' ', '-', $name));
			$file->move('images/featured_image/', $name);
			$input['featured_image'] = $name;
		}
        */
		$blog->update($input);
        // sync with categories
        /*
		if ($request->category_id) {
			$blog->category()->sync($request->category_id);
        }
        */
		return redirect('blogs');
	}

    // Section 34
	public function delete($id) {
		$blog = Blog::findOrFail($id);
		$blog->delete();
		return redirect('blogs');
	}


}
