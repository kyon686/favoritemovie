<?php
    require_once './Function.php';

    if(!empty($_POST)){
        $username = e($_POST['user']);
        $password = e($_POST['password']);
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ユーザ登録確認画面</title>
</head>
<body>

    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <p style="font-weight:bold; margin-left: 20px;">ユーザ名：<?php echo $username; ?></p>
        <p style="font-weight:bold; margin-left: 20px;">パスワード：<?php echo $password; ?></p>
        <p></p>
        <p style="margin-left: 20px;">上記で登録しますか？</p>
        <p></p>
        <form action="signup_done.php" method="post">
            <input type="hidden" style="margin-left: 20px;" name="user" value="<?php echo $username; ?>">
            <input type="hidden" style="margin-left: 20px;" name="password" value="<?php echo $password; ?>">
            <input type="button" style="margin-left: 20px;" onclick="history.back()" value="戻る">
            <input type="submit" style="margin-left: 20px;" name="" value="登録">
        </form>
    </main>

</body>
</html>