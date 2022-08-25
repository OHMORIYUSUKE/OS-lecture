# PHP のコードの解説

## コード

PHP からデータベースにアクセスし、**データの作成**、**データの削除**、**データの取得**を行うコードです。

```php
<?php

$dsn = 'mysql:dbname=webapp;host=localhost';
$user = 'webapp';
$password = 'webappのパスワード';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}

// POST
if ($_POST['method'] == 'post') {
    $stmt = $dbh->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
    $res = $stmt->execute();

    header('Location: index.php');
}

// DELETE
if ($_POST['method'] == 'delete') {
    $stmt = $dbh->prepare("DELETE FROM product WHERE name = :name AND price=:price");
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
    $res = $stmt->execute();

    header('Location: index.php');
}


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売店 | 管理画面</title>
</head>

<body>

    <form method="post" action="index.php">
        <input name="method" type="hidden" value="post">
        商品名
        <input type="text" name="name" size="15">
        価格(円)
        <input type="number" name="price">
        <input type="submit" value="送信">
    </form>

    <?php
    // GET
    $sql = 'select * from product';
    print('<p>商品名  価格(円)</p>');
    foreach ($dbh->query($sql) as $row) {
    ?>
        <form method="post" action="index.php">
            <?php print($row['name'] . ' ' . $row['price'] . '円   '); ?>
            <input name="method" type="hidden" value="delete">
            <input name="name" type="hidden" value="<?php print($row['name']); ?>">
            <input name="price" type="hidden" value="<?php print($row['price']); ?>">
            <input type="submit" value="削除">
        </form>
    <?php
    }
    ?>

</body>

</html>
```

## データベースに接続

```php
$dsn = 'mysql:dbname=webapp;host=localhost';
$user = 'webapp';
$password = 'webappのパスワード';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print('Error:' . $e->getMessage());
    die();
}
```

ここでデータベースに接続しています。接続するためには、`PDO`に**データの名前**、**ホスト名**、**MySQL のユーザーのパスワード**を指定します。

## データを取得

```php
<?php
// GET
$sql = 'select * from product';
print('<p>商品名  価格(円)</p>');
foreach ($dbh->query($sql) as $row) {
?>
    <form method="post" action="index.php">
        <?php print($row['name'] . ' ' . $row['price'] . '円   '); ?>
        <input name="method" type="hidden" value="delete">
        <input name="name" type="hidden" value="<?php print($row['name']); ?>">
        <input name="price" type="hidden" value="<?php print($row['price']); ?>">
        <input type="submit" value="削除">
    </form>
<?php
}
?>
```

**データベースに接続**で作成した、`$dbh`を用いて取得を行います。
SQL を`PDO`クラスの`query`メソッドの引数に渡します。そうすることで、SQL によりデータを取得することができます。

## データを追加

```php
// POST
if ($_POST['method'] == 'post') {
    $stmt = $dbh->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
    $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
    $res = $stmt->execute();

    header('Location: index.php');
}

...

<form method="post" action="index.php">
    <input name="method" type="hidden" value="post">
    商品名
    <input type="text" name="name" size="15">
    価格(円)
    <input type="number" name="price">
    <input type="submit" value="送信">
</form>
```

HTML のフォームからデータを`POST`します。

1. `<form method="post" action="index.php">`
   method には`post`を指定する。
   action には`index.php`を指定する。
   (データを自分自身(index.php)に POST したい)
2. `<input type="text" name="name" size="15">`
   name には`$_POST['name']`で受け取るための名前を指定します。

   name を`price`にして POST すると、PHP では`$_POST['price']`で値を取得することができる。

!!! note

    <form>: フォーム要素
    https://developer.mozilla.org/ja/docs/Web/HTML/Element/form

3. PHP の処理

```php
$stmt = $dbh->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");
$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
$stmt->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
$res = $stmt->execute();
```

1. `$stmt = $dbh->prepare("INSERT INTO product (name, price) VALUES (:name, :price)");`
   不完全な SQL を`PDO`クラスの`prepare`メソッドの引数に渡します。
2. `$stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);`
   不完全な SQL の`:name`に`$_POST['name']`を入れる。
   (`PDO::PARAM_STR`は`$_POST['name']`が string(文字)であることを示す)
3. `$res = $stmt->execute();`
   完全な SQL になったので実行する

データの削除も同様

!!! note

    `<input name="method" type="hidden" value="post">`
    type="hidden"を指定することで、`<input>`タグを非表示にすることができる。
