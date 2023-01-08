<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield("style")
  <title>Document</title>
</head>

<body>
<div class="header">
  <h2>Atte</h2>
  <ul>
    <li><a>ホーム</a></li>
    <li><a href="attendance/attendance_lis?date={{$date}}">日付一覧</a></li>
    <li><a href="/logout">ログアウト</a></li>   
  </ul>  
</div>
@yield("content")
<div class="fooder">
    <small class="fooder_c">Atte,inc.</small>
</div>
</body>
</html>