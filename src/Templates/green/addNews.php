<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <br/> <br/>
    <label>News Categories</label>
    <select name="categories[]" size="4" multiple="multiple">
        <option value=1>Sport</option>
        <option value="2">Politics</option>
        <option value="3">Science</option>
        <option value="4">Entertainment</option>
    </select><br><br>
    <input type="submit" name="action" value="Publish" />
    <input type="submit" name="action" value="Save Draft" />
</form>
<a href="admin">
    <button>Back to admin page</button>
</a>
</body>
</html>