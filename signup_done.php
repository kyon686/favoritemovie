<?php
    try {
        require_once './Function.php';

        $user_name = e($_POST['user']);
        $user_password = e($_POST['password']);

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';

        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'insert into members(username,password) value(:username, :password)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $user_name);
        $stmt->bindParam(':password', password_hash($user_password, PASSWORD_DEFAULT));

        $stmt->execute();

    } catch (PDOException $e) {

        print "データベース接続エラー : {$e->getMessage()}";

    } finally{

        $db = null;

    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>新規登録完了</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <p>登録しました。</p>
        <a href="index.php">トップ画面へ</a>
    </main>
</body>
</html>