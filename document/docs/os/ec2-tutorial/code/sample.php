<html>

<head>
    <title>売店サイト</title>
</head>

<body>

    <form method="post" action="index.php">
        商品名
        <input type="text" name="name" size="15">
        価格(円)
        <input type="number" name="price">
        <input type="submit" value="送信">
    </form>

    <?php

    $dsn = 'mysql:dbname=webapp;host=localhost';
    $user = 'webapp';
    $password = 'qazWSX123$';

    try {
        $dbh = new PDO($dsn, $user, $password);

        if ($_POST['name'] != '') {
            $stmt = $dbh->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
            $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
            $res = $stmt->execute();
        }

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