<div class="container">
    <div class="blog-header">
        <h1 class="blog-title"><?=("$meta_h1" != '') ? "$meta_h1" : "$name"?></h1>
        <p class="lead blog-description"><?=date("d-m-Y", strtotime($created))?></a> by <a href="http://polyakov.co.ua/page/about-me"><?=$author?></a></p>
    </div>

    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php if($image != '') { ?>
                <img class="img-thumbnail" src="<?=$image?>" alt="image description" >
            <?php } ?>
            <?=$content?>
        </div>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>О сайте</h4>
                <p>Текст <em>с описанием</em> зачем нам нужен этот сайт.</p>
            </div>
            <div class="sidebar-module">
                <h4>Страницы</h4>
                <ol class="list-unstyled">
                    <li><a href="/page/homepage">Главная</a></li>
                    <li><a href="/category/articles">Статьи</a></li>
                    <li><a href="/page/second">Главная вторая</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

