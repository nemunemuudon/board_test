<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield("pageTitle")</title>
<link href = "{{mix('css/app.css')}}" rel = "stylesheet">
</head>
<body class = "bg-gray-100">

    <h1>@yield("title")</h1>
    <div class = "wrapper">
        @yield("content")
    </div>

</body>
</html>
