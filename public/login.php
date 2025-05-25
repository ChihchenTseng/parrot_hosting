<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>登入 - Parrot Hosting</title>
</head>
<body>
    <h2>寄宿家庭登入</h2>

    <form method="post" action="../controllers/login_process.php">
        <label for="id">帳號 ID：</label>
        <input type="text" name="id" id="id"><br><br>

        <label for="password">密碼：</label>
        <input type="password" name="password" id="password"><br><br>

        <input type="submit" value="登入">
    </form>

    <p>還沒有帳號？<a href="signup.php">前往註冊</a></p>
</body>
</html>
