<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новая статья</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .article-title {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .article-info {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📰 Новая статья на сайте</h1>
    </div>

    <div class="content">
        <h2 class="article-title">{{ $article->title }}</h2>

        <div class="article-info">
            <p><strong>👤 Автор:</strong> {{ $article->author }}</p>
            <p><strong>📅 Дата создания:</strong> {{ $article->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>📝 Статус:</strong> {{ $article->is_published ? 'Опубликована' : 'Черновик' }}</p>
        </div>

        <div class="article-excerpt">
            <h3>Краткое содержание:</h3>
            <p>{{ Str::limit($article->content, 200) }}</p>
        </div>

        <div style="margin-top: 25px; text-align: center;">
            <a href="{{ url('/news/' . $article->id) }}" class="button">
                📖 Читать статью полностью
            </a>
        </div>

        <div style="margin-top: 20px;">
            <p><strong>Для модератора:</strong></p>
            <ul>
                <li><a href="{{ url('/news/' . $article->id . '/edit') }}">Редактировать статью</a></li>
                <li><a href="{{ url('/news') }}">Все статьи</a></li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Это автоматическое уведомление от системы {{ config('app.name') }}.</p>
        <p>Если вы получили это письмо по ошибке, пожалуйста, проигнорируйте его.</p>
        <p>© {{ date('Y') }} {{ config('app.name') }}</p>
    </div>
</body>
</html>
