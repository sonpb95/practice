<?php

namespace App\Services\Blog;

use Auth;
use App\Services\BlogServiceInterface;
use App\Repositories\Contracts\BlogRepositoryInterface as Blog;

class BlogService implements BlogServiceInterface
{
    /**
     * @var Blog
     */
    private $blog;

    /**
     * BlogService constructor.
     *
     * @param \App\Repositories\Contracts\BlogRepositoryInterface $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @param $title
     * @param $content
     * @return mixed
     */
    public function createBlog($title, $content)
    {
        return $this->blog->create([
                'user_id' => Auth::id(),
                'title' => $title,
                'content' => $content,
        ]);
    }

    /**
     * @return mixed
     */
    public function renderHome()
    {
        return $this->blog->paginate();
    }

    /**
     * @param $blog
     * @return mixed
     */
    public function renderEdit($id)
    {
        return $this->blog->find($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixeds
     */
    public function updateBlog($data, $id)
    {
        return $this->blog->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteBlog($id)
    {
        return $this->blog->delete($id);
    }
}
