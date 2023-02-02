<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="{{asset('/js/test.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
    @include("players.header_user")
    </header>

    <body>
        <div class="profile">
            <p>ユーザープロフィール</p>
            <div class="user_profile">
            <table>
                @foreach ($user_date_profile as $users)
                <tr>
                  <td>
                    <p>{{$users->deadline}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>名前</span>:{{$users->user_name}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>電話番号</span>:{{$users->user_tell}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>郵便番号</span>:{{$users->post}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>都道府県</span>:{{$users->prefectures}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>市区町村</span>:{{$users->municipality}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>番地</span>:{{$users->adoress}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class=""><span>建物名・部屋番号</span>:{{$users->building}}</p>
                  </td>
                </tr>
                @endforeach
              </table>
              {{ $user_date_profile->links() }}
            </div>
        </div>
    </body>