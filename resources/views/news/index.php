<?php

include base_path() . '/resources/views/base/header.php';
?>

    <h1><?= $title ?></h1>
    <div class="d-flex align-items-start">
        <ul class="nav nav-pills flex-column me-3">
            <li class="nav-item">
                <a class="nav-link<?= !isset($currentCategory) ? ' active' : null ?>" aria-current="page"
                   href="<?= route('news.index') ?>">All</a>
            </li>
            <?php foreach ($categories as $category): ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="<?= route('news.category', ['category' => strtolower($category)]) ?>"><?= $category ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <?php foreach ($listNews as $key => $news):
                echo $news[1], "&nbsp<a href='" . route('news.show', ['id' => $key, 'category' => $news[0]]) . "'>Перейти</a><br>";
            endforeach; ?>
        </div>
    </div>

<?php
include base_path() . '/resources/views/base/footer.php';
