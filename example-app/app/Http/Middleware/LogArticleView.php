<?php

namespace App\Http\Middleware;

use App\Models\ArticleView;
use Closure;
use Illuminate\Http\Request;

class LogArticleView
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // получаем ID статьи из маршрута
        $article = $request->route('article');

        if ($article) {
            ArticleView::create([
                'article_id' => is_object($article) ? $article->id : $article,
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
            ]);
        }

        return $response;
    }
}
