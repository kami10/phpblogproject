<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #555;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .container .btn:hover {
            background-color: black;
        }
    </style>
</head>
<body>
<form action="dashboard" method="GET">
    <h1>Choose your favorite Template</h1>
    <img src="assets/img/green.jpg" alt="green" style="height: 450px; width: 400px;">
    <button name="subject"  type="submit" value="green">Activate</button>
    <img src="assets/img/red.jpg" alt="red" style="height: 450px; width: 400px;">
    <button name="subject"  type="submit" value="green">Activate</button>
    <img src="assets/img/blue.jpg" alt="blue" style="height: 450px; width: 400px;">
    <button name="subject"  type="submit" value="green">Activate</button>
</form>
</body>
</html>
