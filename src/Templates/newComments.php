<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="row">
    <?php foreach ($viewVariable as $item => $value): ?>
        <div class="card">
            <h2>
                <?php
                echo $viewVariable['comment'];
                ?>
            </h2>
            <a href="confirmcomment?id=<?= $viewVariable['c_id'] ?>"> Confirm </a><br/>
            <a href="deletecomment?id=<?= $viewVariable['c_id'] ?>">  Delete </a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>