<?php

namespace App\Controllers;

use App\Models\Article;

class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new Article();
    }

    public function index()
    {
        $userId = $_SESSION['user']['id'];

        $articles = $this->model
            ->readByUserId($userId)
            ->fetchAll(\PDO::FETCH_ASSOC);

        view('article/index', ['articles' => $articles]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['user']['id']
            ];
            if ($this->model->create($data)) {
                header("Location: /articles");
            }
        } else {
            view('article/create');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ];
            if ($this->model->update($id, $data)) {
                header("Location: /articles");
            }
        } else {
            $article = $this->model->getById($id);
            view('article/edit', ['article' => $article]);
        }
    }

    public function delete($id)
    {
        if ($this->model->delete($id)) {
            header("Location: /articles");
        }
    }

    public function show($id)
    {
        $article = $this->model->getById($id);
        view('article/show', ['article' => $article]);
    }
}
