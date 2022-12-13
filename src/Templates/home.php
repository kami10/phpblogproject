<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/header.php' ?>

<div class="row">
    <div class="leftcolumn">
        <?php foreach ($viewVariable as $item => $news): ?>
            <div class="card">
                <h2>
                    <?php
                    echo $news['title'];
                    ?>
                </h2>
                <h5>
                    <?php
                    echo $news['created'];
                    ?>
                </h5>
                <div class="fakeimg" style="height:200px;">

                    <img src="<?= $news['image'] ?>" alt="nis nagard" style="height: 90%;"/>

                </div>
                <p>
                    <?php
                    echo $news['short_news'];
                    ?>
                </p>
                <a href="fullnews?id=<?= $news['nid'] ?>"> Read more </a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="rightcolumn">
        <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg">Image</div>
            <br>
            <div class="fakeimg">Image</div>
            <br>
            <div class="fakeimg">Image</div>
        </div>
    </div>
</div>
<div class="footer">
    <h2>Footer</h2>
</div>
</body>
</html>

