Новая статья на сайте {{ config('app.name') }}

Заголовок: {{ $article->title }}
Автор: {{ $article->author }}
Дата: {{ $article->created_at->format('d.m.Y H:i') }}
Статус: {{ $article->is_published ? 'Опубликована' : 'Черновик' }}

Краткое содержание:
{{ Str::limit($article->content, 150) }}

Ссылка на статью: {{ url('/news/' . $article->id) }}

---
Это автоматическое уведомление.
Если вы получили это письмо по ошибке, проигнорируйте его.
