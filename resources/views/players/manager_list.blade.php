<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<script>
</script>

<body>

    <head>
    </head>

    <div class="list">
        <div class="user_list">
            <h2>User list</h2>
        </div>
        <a href="https://twitter.com/intent/tweet?url=シェアさせたい記事のURL&text=タイトルとか" target="blank_">
            Twiiterでシェアする
        </a>
        <h1>検索条件を入力してください</h1>
        <form action="serch" method="post">
            {{ csrf_field()}}
            {{method_field('get')}}
            <div class="form-group">
                <label>名前</label>
                <input type="text" class="form-control col-md-5" placeholder="検索したい名前を入力してください" name="name">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control col-md-5" placeholder="emailを入力してください" name="email" value="{{ old("name")}}">
            </div>

            <div class="form-group">
                <label>年齢の条件</label>
                <select class="form-control col-md-5" name="age_condition">
                    <option selected value="0">選択...</option>
                    <option value="1">以上</option>
                    <option value="2">以下</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-md-5">検索</button>
        </form>
        <table class="manager_th">
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
                    <form action="{{ url('edit')}}" method="post" class="edit-button">
                        {{csrf_field()}}
                        <input type="submit" name="send" value="編集">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="hidden" name="name" value="{{ $user->name }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <input type="hidden" name="password" value="{{ $user->password }}">
                    </form>
                </td>
                <td>
                    <form action="{{ url('./delete')}}" method="post" onClick="return disp()" class="edit-button">
                        {{csrf_field()}}
                        <input type="submit" name="send" value="削除">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="link">{{$users->links()}}</div>
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