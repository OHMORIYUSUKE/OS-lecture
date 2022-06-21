<html>

<head>
    <title>売店サイト</title>
</head>

<body>

    <?php

    $dsn = 'mysql:dbname=webapp;host=localhost';
    $user = 'webapp';
    $password = 'qazWSX123$';

    try {
        $dbh = new PDO($dsn, $user, $password);

        $dbh->query('SET NAMES sjis');

        $sql = 'select * from product';

        print('商品名  価格(円)<br>');

        foreach ($dbh->query($sql) as $row) {
            print($row['name'] . ' ' . $row['price'] . '円<br>');
        }
    } catch (PDOException $e) {
        print('Error:' . $e->getMessage());
        die();
    }

    $dbh = null;

    ?>

</body>

</html>