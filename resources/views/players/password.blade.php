<!DOCTYPE html>
<html>

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
    @include("players.header")
    <div class="ps-from">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="password">
                        <h2>Chnage Password</h2>
                    </div>

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                            <div style="color:blue;font-size: 20px;margin-left: 43.1%;" class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                            <div style="color:red;font-size: 15px;margin-left: 43%;" class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="">
                                @error('old_password')
                                <span class="text-danger" style="color:red;font-size: 15px;margin-left: 41%;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                @error('new_password')
                                <span class="text-danger" style="color:red;font-size: 15px;margin-left: 41%;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label"><span>*</span> Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
                            </div>
                            <div class="mb-5">
                                <label for="newPasswordInput" class="form-label"><span>*</span>New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                            </div>
                            <div class="mb-4">
                                <label for="confirmNewPasswordInput" class="form-label"><span>*</span>Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <button class="button19">変更</button>
                        <div class="">
                            <a class="button20" href="mypage" class="">戻る</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
</script>

</html>