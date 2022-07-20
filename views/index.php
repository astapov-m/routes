<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/main.css">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <form class="form-signin" action="test" method="POST">
        <h2 class="form-signin-heading">Расстояние</h2>
        <input type="text" class="form-control" placeholder="Адрес" id="address" name="address"/>
        <button class="btn btn-lg btn-primary btn-block btn-address" type="submit">Узнать расстояние</button>
        <br>
        <p class="msg"></p>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.12.0/dist/js/jquery.suggestions.min.js"></script>

<script>
    $("#address").suggestions({
        token: "fa6ac428e2d4149a7b3937636f5e5a9540f37378",
        type: "ADDRESS",

        onSelect: function(suggestion) {

        }
    });

    $('.btn-address').click(function (e) {
        e.preventDefault();

        let address = $('input[name="address"]').val();

        $.ajax({
            url: '/getDistance',
            type: 'POST',
            dataType: 'json',
            data: {
                address: address,
            },
            success (data) {
                $('.msg').text(data+"м");
            }
        });
    });

</script>
</body>
</html>
