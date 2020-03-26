<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <input type="search" name="search" id="" placeholder="Search for movie">
    <div id="resDiv"></div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="search"]').keyup(function(e) {
                // e.preventDefault();
                // console.log($('input[type="search"]').val());
                const title = $('input[type="search"]').val();
                $.ajax({
                    type: 'POST',
                    url: 'search-movie.php',
                    data: {
                        title: title
                    },
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