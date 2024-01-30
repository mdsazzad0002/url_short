<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy way to Short Link with TTCM powred by D Engr Web</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="icon" href="/image/sde.jpg">
</head>

<body>
    <?php
    if (file_exists('header.php')) {
        require_once 'header.php';
    }
    ?>

    <section class="hero" id="hero">
        <div class="container">
            <div class="image">
                <img src="/image/send.png" alt="Please wait we are loding">
            </div>
            <div class="content">
                <h1>Make Short Your Url</h1>
                <form id="link_data" action="/mug/link/link_insert.php">
                    <div class="input-group">
                        <label for="link"><i class="bi bi-link"></i></label>
                        <input id="link" name="link" type="text" placeholder="Enter your long url">

                    </div>
                    <input hidden type="text" name="user_type" value="anonymous" id="">
                    <div class="input-group short_link_inbox">
                        <label for="short">https://ttcm.pw/</label>
                        <input name="short_link" hidden oninput="exist_link(this)" id="short" type="text" placeholder="Plase Select short part">
                        <button type="submit">Short link</button>

                    </div>
                    <div class="status"></div>
                    <div class="created"></div>
                </form>
            </div>
        </div>
    </section>
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script>
        function exist_link(thi) {
            $.ajax({
                type: 'POST',
                url: '/mug/link/exist_link.php',
                data: {
                    'link': $(thi).val(),
                },
                success: function(data) {
                    $('.status').html(data);
                    setTimeout(function() {
                        $('.status').html('');
                    }, 15000)
                }
            })
        }

        //insert data link
        $('#link_data').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/mug/link/link_insert.php',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function(data) {
                    $('.created').prepend(data);
                    // load_link();
                }
            })
        })
    </script>
</body>

</html>