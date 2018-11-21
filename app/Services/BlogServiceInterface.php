<?php

namespace App\Services;
  
interface BlogServiceInterface
{
    /**
     * @param $title
     * @param $content
     * @return mixed
     */
    public function createBlog($title, $age, $content);

    /**
     * @return mixed
     */
    public function renderHome();

    /**
     * @param $blog
     * @return mixed
     */
    public function renderEdit($blog);
}
