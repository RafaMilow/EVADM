<!doctype html>
<html>
<head>
<title>Template</title>

	<!-- Meta Tags -->
    <meta name="viewport" content="width=device-width" />

	<!-- CSS -->
    <link rel="stylesheet" href="bower_components/dragula.js/dist/dragula.min.css">
    <link rel="stylesheet" href="css/min/evnts.min.css">
    <link rel="stylesheet" href="css/min/extra.min.css">

    <!-- JS -->
    <script src="bower_components/modernizr/modernizr.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="bower_components/dragula.js/dist/dragula.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>

</head>
<body>

<div class="contain-to-grid sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
    ...
  </nav>
</div>

<div class="row full">
    <div class="small-2 columns">

        <ul class="side-nav">
            <li><a href="hotel.php">Hóteis</a></li>
            <li><a href="index.php">Eventos</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Relatórios</a></li>
        </ul>
       
    </div>

    <div class="small-10 columns">

    {include file='breadcrumb.tpl' breadcrumbs=$arr_breadcrumbs}
    {$APP}

    </div>
</div>


</body>
</html>