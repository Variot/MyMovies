<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Movie;

class MovieDAO extends DAO
{
    
    /**
     * Retourne tous les films
     *
     * @return un tableau de film.
     */
    public function findAll() {
        $sql = "select * from movie order by mov_title";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }
    
    /**
     * Creates an movie object based on a DB row.
     *
     * @param array $row The DB row containing movie data.
     * @return \MyMovies\Domain\Movie
     */
    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setMov_id($row['mod_id']);
        $movie->setMov_title($row['mov_title']);
        $movie->setMov_description_short($row['mov_description_short']);
        $movie->setMov_description_long($row['mov_description_long']);
        $movie->setMov_director($row['mov_director']);
        $movie->setMov_year($row['mov_year']);
        $movie->setMov_image($row['mov_image']);
        $movie->setCat_id($row['cat_id']);
        return $movie;
    }


}