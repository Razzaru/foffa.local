<?php

namespace App\Components;

use T4\Dbal\QueryBuilder;

class Queries
{
    static public function getLastFeaturedArticle()
    {
        $query = new QueryBuilder();
        $query->select()
            ->from('news')
            ->where('is_featured = 1')
            ->order('__id DESC')
            ->limit(1);
        return $query->getQuery('mysql');
    }
    
    static public function getLastTwoItems()
    {
        $query = new QueryBuilder();
        $query->select()
            ->from('items')
            ->where('is_featured = 1')
            ->order('__id DESC')
            ->limit(2);
        return $query->getQuery('mysql');
    }

    static public function getLastArticle()
    {
        $query = new QueryBuilder();
        $query->select()
            ->from('news')
            ->order('__id DESC')
            ->limit(1);
        return $query->getQuery('mysql');
    }

    static public function getLastItem()
    {
        $query = new QueryBuilder();
        $query->select()
            ->from('items')
            ->order('__id DESC')
            ->limit(1);
        return $query->getQuery('mysql');
    }
    
    static public function findAllDesc()
    {
        $query = new QueryBuilder();
        $query->select()
            ->from('news')
            ->order('__id DESC');
        return $query->getQuery('mysql');
    }
}