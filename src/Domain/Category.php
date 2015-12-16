<?php

namespace MyMovies\Domain;

class Category
{
    /**
     * Category code.
     *
     * @var string
     */
    private $cat_id;

    /**
     * Category name.
     *
     * @var string
     */
    private $cat_name;

    /**
     * @return string
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * @param string $cat_id
     */
    public function setCatId($cat_id)
    {
        $this->cat_id = $cat_id;
    }

    /**
     * @return string
     */
    public function getCatName()
    {
        return $this->cat_name;
    }

    /**
     * @param string $cat_name
     */
    public function setCatName($cat_name)
    {
        $this->cat_name = $cat_name;
    }


}