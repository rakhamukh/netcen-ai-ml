<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Input data yang akan dilakukan klasifikasi
    <form action="{{ url('result') }}" method="POST">
        <?php foreach ($columns as $key => $column) { ?>
        <select style="margin:3px 0px;" id="<?=$key?>" name="<?=$key?>">
            <?php foreach($column as $key => $value) { ?>
            <option value="<?=$value?>"><?=$value?></option>
            <?php } ?>
        </select><br>
        <?php } ?>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>