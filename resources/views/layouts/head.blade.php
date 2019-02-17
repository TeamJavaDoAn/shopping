<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes()
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Web bán hàng</title>

    <!-- Google font -->
    {{ Html::style('https://fonts.googleapis.com/css?family=Montserrat:400,500,700') }}

    <!-- Bootstrap -->
    {{ Html::style('/css/bootstrap.min.css') }}

    <!-- Slick -->
    {{ Html::style('/css/slick.css') }}
    {{ Html::style('/css/slick-theme.css') }}

    <!-- nouislider -->
    {{ Html::style('/css/nouislider.min.css') }}

    <!-- Font Awesome Icon -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->
    {{ Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css') }}

    <!-- Custom stlylesheet -->
    {{ Html::style('/css/style.css') }}
    {{ Html::style('/css/main.css') }}

    <!-- Popup login -->
    {{ Html::style('/css/jquery_popup.css') }}

    <!-- Details product -->
    {{ Html::style('/css/detail.css') }}
</head>