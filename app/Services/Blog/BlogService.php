<?php

namespace App\Services\Blog;

use Auth;
use App\Services\BlogServiceInterface;
use App\Repositories\Criteria\Blogs\SearchByAge;
use App\Repositories\Criteria\Blogs\SearchByTitle;
use App\Repositories\Criteria\Blogs\SearchByAuthor;
use App\Repositories\Criteria\Blogs\SearchByGender;
use App\Repositories\Criteria\Blogs\SearchByContent;
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
    public function createBlog($title, $age, $content)
    {
        return $this->blog->create([
            'user_id' => Auth::id(),
            'title' => $title,
            'age_limit' => $age,
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

    public function search($title, $age, $content, $author, $gender)
    {
        $this->blog->pushCriteria(new SearchByTitle($title));
        $this->blog->pushCriteria(new SearchByContent($content));
        $this->blog->pushCriteria(new SearchByAuthor($author));
        $this->blog->pushCriteria(new SearchByAge($age));
        if ($gender != 0) {
            $this->blog->pushCriteria(new SearchByGender($gender));
        }

        return $this->blog->paginate(15);
    }
}
