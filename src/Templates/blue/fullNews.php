<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/header.php' ?>
<?php //echo $viewVariable['newsTitle']; ?>
<div class="row">
    <div class="card">
        <h5><span style="color: red">Title:</span>
            <?php
            echo $viewVariable['fullNews']['title'];
            ?>
            <span style="color: red">Categories:</span>
            <?php foreach ($viewVariable['newsCategories'] as $item => $value) {
                echo $value['cat'];
            }
            ?>
            <span style="color: red">Author:</span>
            <?php foreach ($viewVariable['newsAuthor'] as $item => $value) {
                echo $value['role'];
            }
            ?>
            <span style="color: red">Created:</span>
            <?php
            echo $viewVariable['fullNews']['created'];
            ?>
        </h5>
        <div class="fakeimg" style="height:200px;">

            <img src="<?= $viewVariable['fullNews']['image'] ?>" alt="nis nagard" style="height: 90%;"/>

        </div>
        <p>
            <?php
            echo $viewVariable['fullNews']['long_news'];
            ?>
        </p>
    </div>
</div>
<br/>
<h1>Comments:</h1>
<br/>
<div class="row">
    <?php foreach ($viewVariable['newsComments'] as $item => $value): ?>
    <div class="card">
        <h3><?= $value['comments'] ?></h3>
    </div>
</div>
<?php endforeach; ?>
</div>
<br/>
<div class="row">
    <h1>Add your comment</h1>
    <div class="fakeimg" style="height:200px;">
        <form action="fullnews" method="post">
            <input type="hidden" name="nid" value="<?= $viewVariable['fullNews']['nid'] ?>">
            Name: <input type="text" name="name"><br/><br/>
            Comment: <textarea name="comment"></textarea><br/><br>
            <input type="submit">
        </form>
    </div>
    <div class="footer">
        <h2>Footer</h2>
    </div>
</body>
</html>