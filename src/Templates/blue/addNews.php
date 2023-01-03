<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/autp45y4hhnp93htzdt12u3r36pu8y8f4nyq1esy3824uz7g/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#longNews'
        });
    </script>
    <title>Title</title>
</head>
<body>
<div class="container">
    <br/>
    <br/>
    <form action="addnews" method="post" enctype="multipart/form-data">
        <!--    <input type="hidden" name="nid" value="<?php random ?>">-->
        <label>Title:</label>
        <input type="text" name="title">
        <br/> <br/>
        <label>Date:</label>
        <input type="date" name="date">
        <br/> <br/>
        <label>Image:</label>
        <input type="file" name="image">
        <br/> <br/>
        <label>Short News</label>
        <input type="text" name="shortNews">
        <br/> <br/>
        <label>Long News</label>
        <input type="textarea" name="longNews" id="longNews" style="width: 60%;">
        <br/>
        <label>Select Categories</label>
        <br/>
        <select name="categories[]" size="4" multiple="multiple">
            <?php foreach ($viewVariable['categories'] as $item => $value): ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['cat']; ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" name="action" value="Publish"/>
        <input type="submit" name="action" value="Save Draft"/>
        <input type="submit" name="action" value="Show Sub Categories"/>
    </form>
    <br/>
    <a href="admin">
        <button>Back to admin page</button>
    </a>
</div>
</body>
</html>