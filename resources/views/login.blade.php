<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login" method="post">
        <div>
            <label>帳號：</label>
            <input type="text" name="account">
        </div>
        <div>
            <label>密碼：</label>
            <input type="password" name="pwd">
        </div>

        @csrf

        <input type="submit" value="登入">
    </form>
</body>
</html>