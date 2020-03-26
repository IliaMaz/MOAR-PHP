<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
</head>

<body>
    <div class="register">
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required> <br>
            <input type="email" name="email" placeholder="E-mail" required> <br>
            <input type="email" name="emailC" placeholder="Confirm e-mail" required> <br>
            <input type="password" name="password" placeholder="Password" required> <br>
            <input type="password" name="passwordC" placeholder="Confirm password" required> <br>
            <input type="submit" name="submitRegister" value="Register">
            <div id="regRes"></div>
        </form>
    </div>
    <div class="login">
        <form action="" method="post">
            <input type="text" name="usernameLogin" placeholder="Username"> <br>
            <input type="password" name="passwordLogin" placeholder="Password"><br>
            <input type="submit" name="submitLogin" value="Login">
            <div id="logRes"></div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        /*         $(function() {
            $('input[type="submit"]').click(function(e) {
                e.preventDefault();
                let errors = [];
                let user = $('input[name="username"]').val();
                if ($('input[name="email"]').val() == $('input[name="emailC"]').val()) {
                    const email = $('input[name="email"]').val();
                } else {
                    errors.push('Your emails don\'t match');
                }
                if ($('input[name="password"]').val() == $('input[name="passwordC"]').val()) {
                    let password = $('input[name="password"]').val();
                } else {
                    errors.push('Your passwords don\'t match');
                }
                if (user.length < 5) {
                    errors.push('Username length must be at least 6');
                } else {
                    // !  x@y.zz is the shortest email possible 
                    // ! e.g. google's G.CN for china would result in the shortest email adress possible, e.g. i@g.cn
                    if (email.length < 6 && email.indexOf('@') < 1) {
                        errors.push('Not a valid email address');
                    } else {
                        if (password.length < 6) {
                            errors.push('Password length must be at least 6 characters');
                            let implodedErr = implode('<br>', errors);
                            $('#regRes').html(implodedErr)
                        } else if (errors.count() === 0) {
                            $.ajax({
                                type: 'POST',
                                url: 'login-register.php',
                                data: {
                                    username: user,
                                    email: email,
                                    password: password
                                }
                            })
                        }
                    }
                }
            })
        }) */
        // debugger;
        $(function() {
            $('input[name="submitRegister"]').click(function(e) {
                e.preventDefault();
                const user = $('input[name="username"]').val();
                const email = $('input[name="email"]').val();
                const emailC = $('input[name="emailC"]').val();
                const password = $('input[name="password"]').val();
                const passwordC = $('input[name="passwordC"]').val();
                $.ajax({
                    type: 'POST',
                    url: 'register.php',
                    data: {
                        username: user,
                        email: email,
                        emailC: emailC,
                        password: password,
                        passwordC: passwordC
                    },
                    success: function(res) {
                        $('#regRes').html(res);
                    },
                    error: function(err) {
                        $('#regRes').html(err);
                    }
                })
            })
        })
        $(function() {
            $('input[name="submitLogin"]').click(function(e) {
                e.preventDefault();
                const username = $('input[name="usernameLogin"]').val();
                const passLogin = $('input[name="passwordLogin"]').val();
                $.ajax({
                    type: 'POST',
                    url: 'login.php',
                    data: {
                        username: username,
                        password: passLogin
                    },
                    success: function(res) {
                        $('#logRes').html(res);
                    },
                    error: function(err) {
                        $('#logRes').html(err);
                    }
                })
            })
        })
    </script>
</body>

</html>