<!DOCTYPE html>
<html lang="ja">

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBSC U-15日本代表トライアウト入力 ログイン画面</title>
</head>

<body>
    <div class="text-center">

        <form action="todo_login_act.php" method="POST">
            <img class="mb-1" src="img/samurai_logo.png" alt="" width="300" height="300">
            <fieldset>
                <legend>WBSC U-15日本代表トライアウト入力 ログイン画面</legend>
                <div>
                    username: <input type="text" name="username">
                </div>
                <div>
                    password: <input type="text" name="password">
                </div>
                <div>
                    <button>Login</button>
                </div>
                <a href="todo_register.php">or register</a>
            </fieldset>
        </form>

</body>

</html> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBSC U-15日本代表トライアウト入力 ログイン画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel=" shortcut icon " href="img/favicon.ico">
    <link rel="stylesheet" href="css/style.css">



</head>

<body>
    <div class="container-fluid">
        <img class="mx-auto d-block" src="img/samurai_logo.png" alt="" width="150" height="150">

    </div>
    <div class=" jumbotron jumbotron-extend">
        <img src="img/news.jpg" class="img-fluid" alt="Responsive image">
    </div>
    <div class="text-center">


        <p style="line-height:2rem">

        <form class="form-signin" action="todo_login_act.php" method="POST">
            <img class="mb-1" src="img/samurai_logo.png" alt="" width="300" height="300">
            <fieldset>

                <p style="line-height:2rem">
                <div>
                    <label for=" username" class="sr-only">ユーザーネーム</label>
                    <input type="text" name="username" id="username" placeholder="ユーザーネーム" required autofocus>
                </div>
                <p style="line-height:2rem">
                <div>
                    <input type="password" name="password" id="password" placeholder="パスワード" required>
                </div>
                <div class="checkbox mt-3 mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> サインインしたままにする
                    </label>
                </div>
                <div>
                    <button class="btn mb-3 btn-lg btn-warning">サインイン</button>
                </div>
                <a href="todo_register.php">新規登録</a>



                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script>
                    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
                </script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
                <script src="/docs/4.3/assets/js/vendor/anchor.min.js"></script>
                <script src="/docs/4.3/assets/js/vendor/clipboard.min.js"></script>
                <script src="/docs/4.3/assets/js/vendor/bs-custom-file-input.min.js"></script>
                <script src="/docs/4.3/assets/js/src/application.js"></script>
                <script src="/docs/4.3/assets/js/src/search.js"></script>
                <script src="/docs/4.3/assets/js/src/ie-emulation-modes-warning.js"></script>
</body>


</html>