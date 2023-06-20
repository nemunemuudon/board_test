<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content = "IE = edge">
        <meta name = "viewpoint" content = "width = ,initial-scale = 1.0">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity = "sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel = "stylesheet" href = "{{asset('/css/bbs.css')}}">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <h1>掲示板</h1>
        <form method = "POST" action = "/bbs_add">
            @csrf
            <div class = "usernameWrapper">
                <div class = "form-group">
                    <label for = "name">表示名</label>
                    <input type = "text" id = "name" name = "name" class = "form-control username">
                    @if (!empty($errors -> first('name')))
                        <p class = "error_message">{{$errors -> first('name')}}</p>
                    @endif
                </div>
            </div>
            <div class = "messageWrapper">
                <div class = "form-group">
                    <label for = "message">ひとことメッセージ</label>
                    <textarea name = "message" id = "messagi" class = "form-control"></textarea>
                    @if (!empty($errors -> first('message')))
                        <p class = "error_message">{{$errors -> first('message')}}</p>
                    @endif
                </div>
            </div>
            <div class = "btnWrapper">
                <button type = "submit" class = "btn btn-primary">書き込む</button>
            </div>
        </form>
        <br>
        <div class = "bodyWrapper">
            @foreach ($bbs_data as $data)
                <div class = "messageRow">
                    <div class = "message">
                        <div class = "user_id">
                            <p>NO.{{ $data -> id }}</p>
                        </div>
                        <div class = "user_name">
                            <p>NAME ：{{ $data -> view_name }}</p>
                        </div>
                        <div class = "user_message">
                            <p>{{ $data -> message }}</p>
                        </div>
                        <div class = "timestamp">
                            <p>{{ $data -> created_at }}</p>
                        </div>
                        <div class = "user_delete">
                            <button class = "btn btn-danger" onclick = "bbs_delete('{{$data -> id }}')">削除</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <br>
            {{ $bbs_data -> links() }}
        </div>
    </body>
</html>

<style>
    .message {
        padding: 0.5em 1em;
        margin: 2em 0;
        color: #5d627b;
        background: white;
        border-top: solid 5px #5d627b;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.22);
    }

    /* .message p {
        margin: 0;
        padding: 0;
    } */
</style>

<script>
    function bbs_delete(id) {
        var bbs_id = id
        if(window.confirm('削除しますか')) {
            alert('削除しました。');
            location.href = "/delete/" + bbs_id;
        }
    }
</script>
