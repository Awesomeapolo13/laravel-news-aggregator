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
                    <a class="nav-link<?= strtolower($category) === $currentCategory ? ' active' : null ?>"
                       aria-current="page"
                       href="<?= route('news.category', ['category' => strtolower($category)]) ?>"><?= $category ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content">
            <h4><?= $news ?></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis dolorem in? Animi, architecto
                ducimus eveniet ipsam, laborum magni nesciunt officia perferendis provident quaerat quia rerum similique
                sunt suscipit tempora.</p>
            <a href="<?= route('admin.news.index') ?>">В админку</a>
        </div>
    </div>
<?php
include base_path() . '/resources/views/base/footer.php';
