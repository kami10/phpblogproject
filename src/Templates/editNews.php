<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<br/>
<br/>
<form action="editnews" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nid" value="<?= $viewVariable['nid'] ?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?= $viewVariable['title'] ?>">
    <br/> <br/>
    <label>Date:</label>
    <input type="date" name="date" value="<?= $viewVariable['created'] ?>">
    <br/> <br/>
    <label>Image:</label>
    <input type="file" name="image" value="<?= $viewVariable['image'] ?>">
    <br/> <br/>
    <label>Short News</label>
    <input type="text" name="shortNews" value="<?= $viewVariable['short_news'] ?>">
    <br/> <br/>
    <label>Long News</label>
    <input type="textarea" name="longNews" value="<?= $viewVariable['long_news'] ?>">
    <br/> <br/>
    <input type="submit"/>
</form>
<a href="admin">
    <button>Back to admin page</button>
</a>
</body>
</html>