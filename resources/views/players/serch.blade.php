<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div style="margin-top:50px;">
<h1>検索結果</h1>
@if(isset($users))
<table class="table">
  <tr>
    <th>ユーザー名</th><th>email</th>
  </tr>
  @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td><td>{{$user->email}}</td>
    </tr>
  @endforeach
</table>
@endif
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div>