<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン画面</title>
</head>
<body>

    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="loginform">
                <form action="login_check.php" method="post">
                    <p>ユーザ名</p>
                    <input type="text" name="username" size="30" placeholder="ユーザ名を入力してください">
    
                    <p>パスワード</p>
                    <input type="password" name="password" size="30" placeholder="パスワードを入力してください">
                    <p></p>
                    <input type="submit" value="ログイン">
                </form>
            </div>

            <div class="to_signup">
                <a href="signup.php">ユーザ登録はこちら</a>
            </div>
        </div>
    </main>
    
</body>
</html>