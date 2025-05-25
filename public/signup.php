<!DOCTYPE HTML>
<html lang="zh-Hant">

<head>
    <meta charset="utf-8">
    <title>signup.php</title>
</head>

<body>
    <form name="signup" method="post" action="../controllers/register_process.php">
        <label>ID:</label>
        <input type="text" name="id" size="20" /><br/>
        <label>姓名:</label>
        <input type="text" name="name" size="15" /><br/>
        <label>Email:</label>
        <input type="email" name="email" size="50" /><br/>
        <label>密碼:</label>
        <input type="password" name="password" size="15" /><br/>
        <label>電話:</label>
        <input type="number" name="phone" size="10" /><br/>
        <label  for="location">地址:</label>
        <input type="text" name="location" id="location"><br/>
        <input type="submit" value="註冊">
    </form>
</body>

</html>

