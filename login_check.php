<?php

    try {
        require_once './Function.php';

        $user_name = e($_POST['username']);
        $user_password = e($_POST['password']);

        $dsn = 'mysql:dbname=favoritemovie;host=db-aws-and-infra.cxr2a0ryfy5t.ap-northeast-1.rds.amazonaws.com;charset=utf8';
        $dbuser = 'admin';
        $dbpassword = 'maximum48';

        $db = new PDO($dsn, $dbuser, $dbpassword);
        $sql = 'select * from members where username=:user';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user', $user_name);

        $stmt->execute();

        $db = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rec == false){
            print 'ユーザ名またはパスワードが間違っています。';
            print '<a href="login.php">戻る</a>';
        }
        else{
            if(password_verify($user_password, $rec['password']))
            {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['id'] = $rec['id'];
                $_SESSION['user'] = $user_name;
                $_SESSION['password'] = $user_password;
                header('Location: index.php');
                exit();
            }
            else{
                print 'ログイン認証に失敗しました';
                print '<a href="login.php">戻る</a>';
            }
        }
    } catch (PDOException $e) {
        print "ただいま障害にて大変ご迷惑をおかけしています。{$e->getMessage()}";
    }

?>