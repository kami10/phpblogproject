<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="card">
        <table>
            <tr>
                <th>Comments</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php foreach ($viewVariable['output'] as $item => $value): ?>
                <tr>
                    <td><?= $value['comments'] ?></td>
                    <td><a href="confirmcomment?id= <?= $value['cid'] ?>"> Confirm </a><br/></td>
                    <td><a href="deletecomment?id= <?= $value['cid'] ?>"> Delete </a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>