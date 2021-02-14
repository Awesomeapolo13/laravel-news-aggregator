<?php

include base_path() . '/resources/views/base/header.php';
?>

    <h1><?= $title ?></h1>
    <h4>Add news</h4>
    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="newsTitle" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="newsBody" class="form-label">News body</label>
            <textarea class="form-control" name="newsBody" id="newsBody"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Not plagiarism</label>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

<?php
include base_path() . '/resources/views/base/footer.php';
