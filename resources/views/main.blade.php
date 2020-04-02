<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naive Bayes Classification</title>
</head>
<body>
    <form action="{{ url('exec') }}" method="POST" enctype="multipart/form-data">
        Pilih file data Train (bentuk csv) <br>
        <input type="file" name="train" required><br><br>
        <button type="submit">Submit</button>
    </form> 
</body>
</html>