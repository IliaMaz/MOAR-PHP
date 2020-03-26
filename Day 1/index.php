<!DOCTYPE html>
<html>

<head>
    <title>My LAST Ajax Call</title>
    <!--JOKES-->
</head>

<body>
    <div id="resultForm">...</div>

    <p>Insert a movie</p>
    <form method="POST">
        <div>
            <label for="title">Title :</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="year">Year :</label>
            <input type="text" name="year" id="year" required>
        </div>

        <input type="submit" name="submit" value="Add a movie">
    </form>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                console.log('hohoho');
                e.preventDefault();
                $.ajax({
                    url: 'addMovie.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(result) {
                        $('#resultForm').html('<div class="green">' + result + '</div>');
                    },
                    error: function(err) {
                        // If ajax errors happens
                    }
                });
            });
        });
    </script>
</body>

</html>