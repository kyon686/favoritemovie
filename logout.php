<?php
    session_start();

    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 1800, '/');
    }

    session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログアウト画面</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <p style="margin-left: 20px;">ログアウトしました。</p>
        <a style="margin-left: 20px;" href="login.php">ログイン画面へ</a>
    </main>
</body>
</html>