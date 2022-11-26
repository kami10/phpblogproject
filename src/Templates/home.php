<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
<div class="header">
    <h2>Blog Name</h2>
</div>

<div class="row">
    <div class="leftcolumn">
        <?php foreach ($viewVariable as $item => $value): ?>
            <div class="card">
                <h2>
                    <?php
                    echo $viewVariable['title'];
                    ?>
                </h2>
                <h5>
                    <?php
                    echo $viewVariable['date'];
                    ?>
                </h5>
                <div class="fakeimg" style="height:200px;">
                    <?php
                    echo $viewVariable['image'];
                    ?>
                </div>
                <p>
                    <?php
                    echo $viewVariable['short_news'];
                    ?>
                </p>
               <a href="fullnews?id=<?= $viewVariable['nid'] ?>" > Read more </a>
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

