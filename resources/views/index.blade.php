<!doctype html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cruds</title>
    <link rel="stylesheet" href="css/app.css">
    <style>
      .container { margin-top: 3%; }
      .input-group-addon { font-size: 170%; margin-right: 3%; }
      .tit { text-shadow: 1px 1px 0px #fff, -1px -1px 0px #fff; display: block; letter-spacing: 2px; font-size: 125%; margin-top: 1%; }
      label { margin-left: 30px; }
      input.form-control { max-width: 430px; }
      #app input { border-radius: 0; }
      .btn.btn-secondary.left { border-radius: 10px 0px 0px 10px; }
      .btn.btn-secondary.right { border-radius: 0px 10px 10px 0px; }
    </style>
  </head>

  <body>
    <div id="mute"></div>

    <div id="app">
      <!--div><p>{{-- message --}}</p></div-->
      
      <div class="test">
        <example-component></example-component>
      </div>
      

      <!--div>
        <app-component></app-component>
      </div-->
      

      <!--div>
        <crud-component></crud-component>
      </div-->


    </div>


    <script src="js/app.js"></script>
  </body>

</html>