<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <input type="search" name="search" placeholder="Search for movie">
    <div id="resDiv"></div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        // * Listen to input, on keyup do function(e)
        $(function() {
            $('input[type="search"]').keyup(function(e) {
                // e.preventDefault();
                // console.log($('input[type="search"]').val());
                // * Assign value of input to const
                const title = $(this).val();
                // * Do ajax post to search-movie.php, formatted as title: title
                $.ajax({
                    type: 'POST',
                    url: 'search-movie.php',
                    data: {
                        title: title
                    },
                    // ! In this case, using done() is better because there is no diff to what we do between success/error
                    // ! If the results of err/res differ
                    // * On success show res
                    success: function(res) {
                        $('#resDiv').html(res);
                    },
                    // * On err show err
                    error: function(err) {
                        $('#resDiv').html(err);
                    }
                })
            })
        })
    </script>
</body>

</html>