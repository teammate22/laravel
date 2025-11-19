<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Читаем данные из JSON файла
        $articlesJson = file_get_contents(public_path('articles.json'));
        $articles = json_decode($articlesJson, true);

        // Проверяем существование файлов изображений и добавляем ID
        foreach ($articles as $index => &$article) {
            $article['id'] = $index + 1; // Добавляем ID, так как его нет в JSON
            $article['preview_exists'] = file_exists(public_path($article['preview_image']));
            $article['full_exists'] = file_exists(public_path($article['full_image']));
        }

        // Передаем данные в представление
        return view('welcome', ['articles' => $articles]);
    }

    public function gallery($id)
    {
        // Читаем данные из JSON файла
        $articlesJson = file_get_contents(public_path('articles.json'));
        $articles = json_decode($articlesJson, true);

        // Находим статью по индексу (ID - 1)
        $articleIndex = $id - 1;

        if (!isset($articles[$articleIndex])) {
            abort(404); // Если статья не найдена
        }

        $article = $articles[$articleIndex];
        $article['id'] = $id; // Добавляем ID для обратной совместимости

        // Проверяем существование файла
        $article['full_exists'] = file_exists(public_path($article['full_image']));

        return view('gallery', ['article' => $article]);
    }
}
