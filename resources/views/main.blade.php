<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naive Bayes</title>
    <style>
        body {
            background: #eee;
        }
        table tr td {
            padding: 3px 10px;
        }
        button {
            width: 100%;
        }
        #main {
            background: #ffffff;
            width: 370px;
            margin: 20px auto;
            padding: 20px;
            border-top: 4px solid purple;
            border-bottom: 4px solid purple;
        }
    </style>
</head>
<body>
    <div id="main">
        <center>
            <table>
                <form action="{{ url('exec') }}" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td>File Train</td>
                        <td><input type="file" name="train" required></td>
                    </tr>
                    <tr>
                        <td>File Test</td>
                        <td><input type="file" name="test" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit">Naive Bayes!</button></td>
                    </tr>
                </form>
            </table>
            
            @isset($data)
                <br>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Result</th>
                    </tr>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row['id'] }}</td>
                            <td>{{ $row['result'] }}</td>
                        </tr>             
                    @endforeach
                </table>          
            @endisset
        </center>
    </div>    
</body>
</html>