<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>

<body>
    <div id="resDiv"></div>
    <form action="insert-movie.php" method="post">
        <input type="text" name="title" id="" placeholder="Movie title"> <br>
        <textarea name="description" id="" cols="30" rows="10" required placeholder="Describe your movie"></textarea> <br>
        <input type="date" name="release_date" id=""> <br>
        <select name="director_id" id="">
            <?php
            require_once 'database.php';
            $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, '3309');
            $query = 'SELECT * FROM directors';
            $res_query = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($res_query)) {
                echo '<option value="' . $row['id'] . '">' . $row['first_name'] . ' ' . $row['last_name']  . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Add movie">
    </form>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                console.log('REEEEEEE')
                e.preventDefault();
                $.ajax({
                    url: 'insert-movie.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(res) {
                        $('#resDiv').html(res);

                    },
                    error: function(err) {
                        $('#resDiv').html(err);
                    }
                })

            })
        })
    </script>
</body>

</html>