<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand">WhiteBOARD</a>
    </div>
    <div style="width:130pt;margin-left:auto" class="baseInfo">
      <div>社員番号：2</div>
      <div>社員氏名：サンプル社員</div>
      <div>所属部署：サンプル部署</div>
    </div>
  </div>
</nav>

<body>
    <div class="container">
        @yield('content')
    </div>

<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    @yield('script')
</script>
</body>
</html>
