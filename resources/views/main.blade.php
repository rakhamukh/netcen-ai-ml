<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('exec') }}" method="POST" enctype="multipart/form-data">
        File Train <input type="file" name="train"><br>
        File Test <input type="file" name="test"><br>
        <button type="submit">Naive Bayes!</button>
    </form>    
</body>
</html>