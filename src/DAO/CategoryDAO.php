<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Category;

class CategoryDAO extends DAO
{
    /**
     * Retourne toutes les catégories
     *
     * @return array A list of all categories.
     */
    public function findAll() {
        $sql = "select * from category order by cat_name";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $categories = array();
        foreach ($result as $row) {
            $CategoryCode = $row['cat_id'];
            $categories[$CategoryCode] = $this->buildDomainObject($row);
        }
        return $categories;
    }
    
    /**
     * Creates an Category object based on a DB row.
     *
     * @param array $row The DB row containing Category data.
     * @return \MyMovies\Domain\Category
     */
    protected function buildDomainObject($row) {
        $cat = new Categorie();
        $cat->setCat_id($row['cat_id']);
        $cat->setCat_name($row['cat_name']);
        return $cat;
    }
    
    /**
     * Return a category with given parameters
     *
     * @param string $code
     *
     * @return \MyMovies\Domain\Category|throws an exception if no matching article is found
     */
    public function find($code) {
        $sql = "select * from category where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($code));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No category found : " . $code);
    }
}