## ユーザーを作成

```sh
mysql> create user 'webapp'@'localhost' identified by 'qazWSX123$';
Query OK, 0 rows affected (0.01 sec)

mysql>
```

```sh
mysql> SELECT Host, User FROM mysql.user;
+-----------+------------------+
| Host      | User             |
+-----------+------------------+
| localhost | debian-sys-maint |
| localhost | mysql.infoschema |
| localhost | mysql.session    |
| localhost | mysql.sys        |
| localhost | root             |
| localhost | webapp           |
+-----------+------------------+
6 rows in set (0.00 sec)
```

## データベースを作成

```sh
mysql> create database webapp;
Query OK, 1 row affected (0.01 sec)

mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| sys                |
| webapp             |
+--------------------+
5 rows in set (0.00 sec)
```

## テーブルを作成

```sh
mysql> create table webapp.product (name varchar(255), price int);
Query OK, 0 rows affected (0.04 sec)

mysql> show tables from webapp;
+------------------+
| Tables_in_webapp |
+------------------+
| product          |
+------------------+
1 row in set (0.00 sec)
```

### insert

```sh
mysql> select * from webapp.product;
Empty set (0.01 sec)

mysql> INSERT INTO webapp.product(name, price) VALUES ('apple', 100);
Query OK, 1 row affected (0.00 sec)

mysql> INSERT INTO webapp.product(name, price) VALUES ('pen', 200);
Query OK, 1 row affected (0.00 sec)

mysql> INSERT INTO webapp.product(name, price) VALUES ('pineapple', 500);
Query OK, 1 row affected (0.01 sec)

mysql> select * from webapp.product;
+-----------+-------+
| name      | price |
+-----------+-------+
| apple     |   100 |
| pen       |   200 |
| pineapple |   500 |
+-----------+-------+
3 rows in set (0.00 sec)

mysql>
```

## webapp ユーザーの権限

```sh
mysql> SHOW GRANTS FOR 'webapp'@'localhost';
+--------------------------------------------+
| Grants for webapp@localhost                |
+--------------------------------------------+
| GRANT USAGE ON *.* TO `webapp`@`localhost` |
+--------------------------------------------+
1 row in set (0.00 sec)
```

### 権限を付与

```sh
mysql> GRANT DELETE, INSERT, SELECT, UPDATE ON webapp.product TO 'webapp'@'localhost';
Query OK, 0 rows affected (0.01 sec)

mysql>
```

### 結果

```sh
mysql>  SHOW GRANTS FOR 'webapp'@'localhost';
+------------------------------------------------------------------------------------+
| Grants for webapp@localhost                                                        |
+------------------------------------------------------------------------------------+
| GRANT USAGE ON *.* TO `webapp`@`localhost`                                         |
| GRANT SELECT, INSERT, UPDATE, DELETE ON `webapp`.`product` TO `webapp`@`localhost` |
+------------------------------------------------------------------------------------+
2 rows in set (0.01 sec)
```

### 権限を取り消す

```sh
mysql> REVOKE DELETE, INSERT, SELECT, UPDATE ON webapp.product FROM 'webapp'@'localhost';
Query OK, 0 rows affected (0.00 sec)
```
