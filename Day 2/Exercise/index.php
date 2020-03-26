<?php
session_start();
require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
$query = "SELECT * FROM products";
$res = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Store</title>
    <style>
        a,
        p,
        div {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            justify-content: space-between;
        }

        b a {
            text-decoration: none;
        }

        b {
            display: flex;
            justify-content: space-between;
            width: 13%
        }

        hr {
            width: 80%;
        }
    </style>
</head>

<body>
    <div style="display: flex;">
        <a href="login-register.php">Login/Register</a>
        <b>
            <p><?php echo 'Welcome ' . $_SESSION['username']; ?></p>
            <a id="cart" href=""></a>
        </b>
    </div>
    <section class="row">
        <h2>Products</h2>
        <hr>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<div class="col s3">
            <div class="card">
                <div class="card-image">
                    <img src="' . $row['picture'] . '">
                    <span class="card-title blue-text"><b>' . $row['name'] . '</b></span>
                    <a name="product" value="' . $row['id'] . '" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">+</i></a>
                </div>
                <div class="card-content">
                    <p>$' . $row['price'] . '</p>
                    <p>' . $row['category'] . '</p>
                    <p>' . $row['description'] . '</p>
                </div>
            </div>
        </div>';
        }
        ?>
    </section>
    <div id="res"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        const arr = [];
        $(function() {
            $('a[name="product"]').click(function(e) {
                e.preventDefault();
                const prodId = $(this).attr('value');
                $.ajax({
                    type: 'POST',
                    url: 'cart.php',
                    data: {
                        product_id: prodId
                    }
                }).done(function(res) {
                    arr.push(res);
                    $('#cart').html('Cart (' + arr.length + ')');
                })
                console.log(arr);
            })
        })
    </script>
</body>

</html>

<?php
// var_dump($_COOKIE);
// var_dump($_SESSION);
