<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naive Bayes Classification</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <form action="{{ url('exec') }}" method="POST" enctype="multipart/form-data">
        Pilih file data Train (bentuk csv) <br>
        <input type="file" name="train" required><br><br>
        <button type="submit">Submit</button>
    </form> 

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>