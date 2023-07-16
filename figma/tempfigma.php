<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

            $nurse = $_GET['nurse'];
            $name = $_GET['name'];
            $need = $_GET['need'];
            $kind = $_GET['kind'];
            $sum = $_GET['sum'];
            $until = $_GET['date'];
            echo "<p>שם האחות: $nurse</p>";
            echo "<p>שם הקמפיין: $name</p>";
            echo "<p>צורך: $need</p>";
            echo "<p>סוג דם: $kind</p>";
            echo "<p>כמות נדרשת: $sum</p>";
            echo "<p>תאריך יעד: $until</p>";
        ?>
</body>
</html>