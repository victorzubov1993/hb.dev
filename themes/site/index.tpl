<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{meta_title}</title>
    <meta name="description" content="{meta_description}" />
    <meta name="keywords" content="{meta_keywords}" />

    <link href="/themes/site/css/bootstrap.css" rel="stylesheet">
    <link href="/themes/site/css/style.css" rel="stylesheet">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <div class="blog-masthead">
        <div class="container">
            <nav class="blog-nav">
                <a class="blog-nav-item active" href="/">Главная</a>
                <a class="blog-nav-item" href="/category/articles">Статьи</a>
                <a class="blog-nav-item" href="http://polyakov.co.ua">Блог</a>

            </nav>
        </div>
    </div>

    {content}

    <div class="blog-footer">
        <p>{sitename}<br/>  by<br/> <a href="http://polyakov.co.ua">zhenya_polyakov</a></p>
    </div>
<script src="/themes/site/js/bootstrap.js"></script>
</body>
</html>