<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<?php //var_dump($viewVariable['latestNews']);die; ?>
<?php //var_dump($viewVariable['output']);die; ?>
<body>
<?php include __DIR__ . '/header.php' ?>
<div class="row">
    <div class="leftcolumn">
        <?php foreach ($viewVariable['output'] as $item => $news): ?>
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
        <?php foreach ($viewVariable['latestNews'] as $item => $news): ?>
            <div class="card">
                <h3>Popular Post</h3>
                <div class="fakeimg"><?php echo $news['title'] ?></div>
                <br>
                <div class="fakeimg"><?= $news['title'] ?></div>
                <br>
                <div class="fakeimg"><?= $news['title'] ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="footer">
    <h2>Footer</h2>
</div>
</body>
</html>

