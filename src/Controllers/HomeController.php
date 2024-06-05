<?php

namespace App\Controllers;

use App\Models\Article;

class HomeController
{
    public function index()
    {
        $result = (new Article())->read();
        $articles = $result->fetchAll(\PDO::FETCH_ASSOC);

        view('home', ['articles' => $articles]);
    }
}
