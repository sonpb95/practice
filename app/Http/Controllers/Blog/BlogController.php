<?php

namespace App\Http\Controllers\Blog;

use App\Services\BlogServiceInterface as BlogService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * @var BlogService
     */
    private $blogService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Gate::allows('create')) {
            $title = $request->title;
            $content = $request->content;
            $age = $request->age;
            $this->blogService->createBlog($title, $age, $content);

            return redirect()->route('blog.home');
        } else {
            return redirect()->route('blog.home');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $results = $this->blogService->renderHome();

        return view('blog.home', compact('results'));
    }

    /**
     * @param \App\Blog $blog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Blog $blog)
    {
        try {
            $results = $this->blogService->renderEdit($blog->id);
        } catch (\Exception $e) {
            echo 'có exception nè';
    }
        return view('blog.edit', compact('results'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $title = $request->title;
        $age = $request->age;
        $content = $request->content;
        $blog = [
            'id' => $id,
            'title' => $title,
            'age_limit' => $age,
            'content' => $content,
        ];
        $results = $this->blogService->updateBlog($blog, $id);

        return redirect()->route('blog.home');
    }

    /**
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Blog $blog)
    {
        $results = $this->blogService->deleteBlog($blog->id);

        return redirect()->route('blog.home');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request)
    {
        $results = $this->blogService->search($request->title, $request->age, $request->content, $request->author,
            $request->gender);

        return view('blog.home', compact('results'));
    }
}
