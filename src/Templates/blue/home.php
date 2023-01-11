<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="style" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">-->
</head>
<body>
<?php //$homeModelView = new \App\Model\HomeModelView();
//var_dump($homeModelView->getFiveLatestNews());die;
//?>
<?php include __DIR__ . '/header.php' ?>
<?php echo ' <h1 style="color: darkblue;background-color: cornflowerblue">Blue template</h1>' ?>
<div class="row">
    <div class="leftcolumn">
        <?php foreach ($viewVariable['fiveLatestNews'] as $item => $news): ?>
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
            <?php foreach ($viewVariable['threeLatestNews'] as $item => $news): ?>
                <br/>
                <div class="fakeimg"><?php echo $news['title'] ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<br/><br/>
<div class="center">
    <div class="pagination">
        <?php
        if ($viewVariable['current'] > 1) {
            echo "<a href='home?page=" . ($viewVariable['current'] - 1) . "' class='btn btn-danger'>Previous</a>";
        }
        for ($i = 1; $i < $viewVariable['totalPageCount']; $i++) {
            echo "<a href='home?page=" . $i . "' class='btn btn-success'>$i</a>";
        }
        if ($i > $viewVariable['current']) {
            echo "<a href='home?page=" . ($viewVariable['current'] + 1) . "' class='btn btn-danger'>Next</a>";
        }
        ?>
    </div>
</div>
<div class="footer">
    <h2>Footer</h2>
</div>
</body>
</html>

