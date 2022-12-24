<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<br/>
<br/>
<form action="updatenews" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nid" value="<?= $viewVariable['output']['nid'] ?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?= $viewVariable['output']['title'] ?>">
    <br/> <br/>
    <label>Created Date:</label>
    <input type="text" value="<?= $viewVariable['output']['created'] ?>">
    <br/><br/>
    <label>Update Date:</label>
    <input type="date" name="date">
    <br/> <br/>
    <label>Image:</label>
    <img src="<?= $viewVariable['output']['image'] ?>" alt="nis nagard" style="height: 60px; width: 80px;"/>
    <br/><br/>
    <input type="file" name="image">
    <br/> <br/>
    <label>Short News</label>
    <input type="text" name="shortNews" value="<?= $viewVariable['output']['short_news'] ?>">
    <br/> <br/>
    <label>Long News</label>
    <input type="textarea" name="longNews" value="<?= $viewVariable['output']['long_news'] ?>">
    <br/> <br/>
    <input type="submit" name="action" value="Publish" />
    <input type="submit" name="action" value="Save Draft" />
</form>
<br/>
<a href="admin">
    <button>Back to admin page</button>
</a>
</body>
</html>