<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naive Bayes Classification</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    Input data yang akan dilakukan klasifikasi
    <form action="{{ url('result') }}" method="POST">
        <table>
            <?php $i = 0; foreach ($columns as $key => $column) { ?>
            <tr>
                <td>
                    <?=$key?>
                </td>
                <td>
                    <select style="margin:3px 0px;" id="<?=$key?>" name="<?=$i++?>">
                        <?php foreach($column as $key => $value) { ?>
                        <option value="<?=$value?>"><?=$value?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <?php } ?>
        </table>
        <button type="submit">Submit</button>
    </form>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>