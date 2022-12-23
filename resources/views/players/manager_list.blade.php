<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="{{asset('/js/cafe.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
</script>
<body>
    <head>
        <div class="user_list">
            <h2>User list</h2>
        </div>
    </head>

    <div class="list">
    <div class="list-user">
    <table>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>パスワード</th>
        </tr>
        @foreach($users as $user)
        <tr class="db_select">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>
                <form action="{{ url('edit')}}" method="post">
                    {{csrf_field()}}
                    <input type="submit" name="send" value="編集">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="hidden" name="name" value="{{ $user->name }}">
                    <input type="hidden" name="email" value="{{ $user->email }}">
                    <input type="hidden" name="password" value="{{ $user->password }}">
                </form>
            </td>
            <td>
                <form action="{{ url('./delete')}}" method="post" onClick="return disp()">
                    {{csrf_field()}}
                    <input type="submit" name="send" value="削除">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    </div>
    <div class="">
        <a href="index" class="button15">トップへ戻る</a>
    </div>
    <script>
        function disp() {
            if (window.confirm('削除しますか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>