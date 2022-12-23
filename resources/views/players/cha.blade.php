<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="{{asset('/css/index.css')}}" rel="stylesheet">
    <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="chat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.7.8/firebase-app.js"></script>
    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyCo-BVHknS_wFUtag7fNPf7K4-07KZkB3E",
            authDomain: "chat-33d01.firebaseapp.com",
            projectId: "chat-33d01",
            storageBucket: "chat-33d01.appspot.com",
            messagingSenderId: "127900335617",
            appId: "1:127900335617:web:83b6eb2897f6ef54b48a00",
            measurementId: "G-KJNZXV31SB"
        };
    </script>
</head>

<body class="chat_body">
    @include("players.header")
    <div class="main_form">
        <div class="button16">
            <a href="index" class="">戻る</a>
        </div>
        <h1 class="community">Community</h1>
        <div class="sub_form">
            <div class="chat_user">
                <p>ユーザ名</p>
                <textarea name="" id="jsi-name" cols="50" rows="1"></textarea>
            </div>

            <div class="message">
                <p>内容</p>
                <textarea name="" id="jsi-msg" cols="50" rows="1"></textarea>
            </div>

            <button name="button" id="jsi-button" style="cursor:pointer;">
                <p>送信</p>
            </button>
        </div>

        <ul id="jsi-board" style="list-style:none;">
            <li></li>
        </ul>
    </div>

    <script>
        var CHAT = CHAT || {};

        CHAT.fire = {
            init: function() {
                this.setParameters();
                this.bindEvent();
            },

            setParameters: function() {
                this.$name = $('#jsi-name');
                this.$textArea = $('#jsi-msg');
                this.$board = $('#jsi-board');
                this.$button = $('#jsi-button');

                //データベースと接続する。各自登録時に出たコードに書き換え。
                this.chatDataStore = new Firebase('https://chat-33d01-default-rtdb.firebaseio.com/');
            },

            bindEvent: function() {
                var self = this;
                this.$button.on('click', function() {
                    self.sendMsg();
                });

                //DBの「talks」から取り出す
                this.chatDataStore.child('talks').on('child_added', function(data) {
                    var json = data.val();
                    self.addText(json['user']);
                    self.addText(json['message']);
                });
            },

            //ユーザー、メッセージ送信
            sendMsg: function() {
                var self = this;
                if (this.$textArea.val() == '') {
                    return
                }

                var name = this.$name.val();
                var text = this.$textArea.val();

                //データベースの中の「talks」に値を送り格納（'talks'は各自任意に設定可能）
                self.chatDataStore.child('talks').push({
                    user: name,
                    message: text
                });
                self.$textArea.val('');
            },

            //受け取り後の処理
            addText: function(json) {
                var msgDom = $('<li>');
                msgDom.html(json);
                this.$board.append(msgDom[0]);
            }
        }

        $(function() {
            CHAT.fire.init();
        });
    </script>
</body>

</html>