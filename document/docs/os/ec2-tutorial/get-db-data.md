# データベースからデータを取得

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo apt install php-pdo
Reading package lists... Done
Building dependency tree... Done
Reading state information... Done
Note, selecting 'php8.1-common' instead of 'php-pdo'
php8.1-common is already the newest version (8.1.2-1ubuntu2.1).
php8.1-common set to manually installed.
0 upgraded, 0 newly installed, 0 to remove and 23 not upgraded.
```

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo apt install php-mysql
Do you want to continue? [Y/n] Y
Get:1 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 php8.1-mysql amd64 8.1.2-1ubuntu2.1 [130 kB]
Get:2 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 php-mysql all 2:8.1+92ubuntu1 [1834 B]
Fetched 132 kB in 0s (2329 kB/s)
Selecting previously unselected package php8.1-mysql.
(Reading database ... 122785 files and directories currently installed.)
Preparing to unpack .../php8.1-mysql_8.1.2-1ubuntu2.1_amd64.deb ...
Unpacking php8.1-mysql (8.1.2-1ubuntu2.1) ...
Selecting previously unselected package php-mysql.
Preparing to unpack .../php-mysql_2%3a8.1+92ubuntu1_all.deb ...
Unpacking php-mysql (2:8.1+92ubuntu1) ...
Setting up php8.1-mysql (8.1.2-1ubuntu2.1) ...

Creating config file /etc/php/8.1/mods-available/mysqlnd.ini with new version

Creating config file /etc/php/8.1/mods-available/mysqli.ini with new version

Creating config file /etc/php/8.1/mods-available/pdo_mysql.ini with new version
Setting up php-mysql (2:8.1+92ubuntu1) ...
Processing triggers for libapache2-mod-php8.1 (8.1.2-1ubuntu2.1) ...
Processing triggers for php8.1-cli (8.1.2-1ubuntu2.1) ...
Scanning processes...
Scanning candidates...
Scanning linux images...

Restarting services...
 systemctl restart apache2.service


No containers need to be restarted.

No user sessions are running outdated binaries.

No VM guests are running outdated hypervisor (qemu) binaries on this host.
```

### コード

```php
<html>

<head>
    <title>売店サイト</title>
</head>

<body>

    <form method="post" action="index.php">
    商品名
    <input type="text" name="name" size="15" >
    価格(円)
    <input type="number" name="price" >
    <input type="submit" value="送信">
    </form>

    <?php

    $dsn = 'mysql:dbname=webapp;host=localhost';
    $user = 'webapp';
    $password = 'qazWSX123$';

    try {
        $dbh = new PDO($dsn, $user, $password);

        if($_POST['name'] != ''){
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
```
