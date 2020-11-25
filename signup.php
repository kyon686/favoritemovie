<?php
    if(!empty($_POST))
    {
        if($_POST['user'] == ''){
            $error['user'] = 'blank';
        }
        if($_POST['password'] == ''){
            $error['password'] = 'blank';
        }
        if($_POST['repassword'] == ''){
            $error['repassword'] = 'blank';
        }
        if($_POST['password'] != $_POST['repassword'])
        {
            $error['password_nomatch'] = true;
        }
        if(empty($error)){
            header('Location: signup_check.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/style.css">
    <title>新規ユーザ登録画面</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="./ajax.js"></script>
</head>
<body>
    <header>
        <nav>
            <h1><a href="index.php">ああああ</a></h1>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="signup_form">
                <form action="signup_check.php" method="post">
                    <p>ユーザ名</p>
                    <?php if(isset($error['user']) && $error['user'] == 'blank') : ?>
                        <p style="color: red;">※ユーザ名は必須項目です。</p>
                    <?php endif; ?>
                    <p id="username_duplicate"></p>
                    <input type="text" size="30" name="user" placeholder="ユーザ名を入力してください" id="userName">

                    <p>パスワード</p>
                    <?php if(isset($error['password']) && $error['password'] == 'blank') : ?>
                        <p style="color: red;">※パスワードは必須項目です。</p>
                    <?php endif; ?>
                    <input type="password" size="30" name="password" placeholder="パスワードを入力してください">

                    <p>パスワード（再入力）</p>
                    <?php if(isset($error['repassword']) && $error['repassword'] == 'blank') : ?>
                        <p style="color: red;">※再度パスワードを入力してください。</p>
                    <?php endif; ?>
                    <input type="password" size="30" name="repassword" placeholder="パスワードを再入力してください">

                    <?php if(isset($error['password_nomatch']) && $error['password_nomatch'] == true) : ?>
                        <p style="color: red;">※パスワードが一致しません。</p>
                    <?php endif; ?>

                    <p></p>
                    <input type="button" onclick="history.back()" value="戻る">
                    <input type="submit" value="確認">
                </form>
            </div>
        </div>
    </main>
</body>
</html>