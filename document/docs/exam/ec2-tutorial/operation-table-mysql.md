## ユーザーを作成

root ユーザーでアプリケーションからデータベースにアクセスするのは、セキュリティ上問題があるのでユーザーを作成する。このユーザーでアプリケーションからデータベースに接続を行います。

### 課題

mysql に root ユーザーで入りましょう。

```sh
mysql> ______ ____ '______'@'_________' __________ __ '_____________';
Query OK, 0 rows affected (0.01 sec)

mysql>
```

ユーザー名を`webapp`
ホスト名を`localhost`
パスワードを`webappのパスワード`
で作成します。

> パスワードは自由に決めても大丈夫です。

!!! note

    これ以降は、MySQLのwebappユーザーのパスワードは`webappのパスワード`と表記します。

### ユーザーの確認

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

正しく`webapp`ユーザーが作成されていることが確認できます。

## データベースを作成

```sh
mysql> ______ ________ ______;
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

今回のアプリケーションのためのデータベースを作成します。
`webapp`というデータベースを作成します。

`show databases;`
データベースの一覧を表示します。
`webapp`データベースが作成されていることが確認できます。

## テーブルを作成

```sh
mysql> _____ ______ ______._______ (___ ____, _____ ___);
Query OK, 0 rows affected (0.04 sec)

mysql> show tables from webapp;
+------------------+
| Tables_in_webapp |
+------------------+
| product          |
+------------------+
1 row in set (0.00 sec)
```

`webapp`データベースに`product`テーブルを作成する。

product テーブル

```
+-----------+-------+
| name      | price |
+-----------+-------+
```

> name は商品の名前(text)、price は商品の値段(int)

このようなテーブルが作成されます。

`show tables from webapp;`
`webapp`データベース内のテーブルを表示させる。

### テーブルにデータを追加

```sh
mysql> select * from webapp.product;
Empty set (0.01 sec)

mysql> ______ ____ ______.________(____, _____) ______ ('_____', ___);
Query OK, 1 row affected (0.00 sec)

mysql> ______ ____ ______.________(____, _____) ______ ('_____', ___);
Query OK, 1 row affected (0.00 sec)

mysql> ______ ____ ______.________(____, _____) ______ ('_____', ___);
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

`select * from webapp.product;`
`webapp`データベースの`product`テーブルを表示する。

`webapp`データベースの`product`テーブルにデータを追加

`select * from webapp.product;`
データが挿入されていることが確認できる。

```
+-----------+-------+
| name      | price |
+-----------+-------+
| apple     |   100 |
| pen       |   200 |
| pineapple |   500 |
+-----------+-------+
3 rows in set (0.00 sec)
```

!!! note

    簡単にSQLを実行する方法も解説しています。
    [MySQLテクニック](../appendix/mysql.md)

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

`SHOW GRANTS FOR 'webapp'@'localhost';`
`'webapp'@'localhost'`ユーザーの権限を確認するコマンドです。

webapp ユーザーには、権限が付与されていないことが確認できます。

> `USAGE`は権限が何もないことを示します。

### 権限を付与

!!! note

    詳細はこちらを確認してください。
    6.2.1 MySQL で提供される権限
    https://dev.mysql.com/doc/refman/5.6/ja/privileges-provided.html

```sh
mysql> GRANT DELETE, INSERT, SELECT, UPDATE ON webapp.product TO 'webapp'@'localhost';
Query OK, 0 rows affected (0.01 sec)

mysql>
```

`GRANT DELETE, INSERT, SELECT, UPDATE ON webapp.product TO 'webapp'@'localhost';`
`'webapp'@'localhost'`に`webapp`データベースの`product`テーブルの`DELETE`(カラムの削除), `INSERT`(データの追加), `SELECT`(データの取得), `UPDATE`(データの更新)の権限を与える設定を行います。

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

権限が付与されたことが確認できます。

!!! note

    これで、アプリケーションから攻撃を受けたとしても他のデータベースにアクセスされる可能性や、データベースを消去されるリスクを下げることができました。

## テクニック

簡単に SQL を実行させる方法を紹介します。

`/var/www/html`に`insert_data.sql`と`create_table.sql`を作成してください。

```sql title="create_table.sql"
DROP TABLE IF EXISTS product;
______ _____ _______ (____ ____, _____ ___);
```

```sql title="insert_data.sql"
______ ____ _______(____, _____) ______ ('_____', ___);
______ ____ _______(____, _____) ______ ('_____', ___);
______ ____ _______(____, _____) ______ ('_____', ___);
```

作成後、以下のコマンドを実行してください。

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ mysql -uroot -pルートのパスワード -h localhost webapp < create_table.sql
mysql: [Warning] Using a password on the command line interface can be insecure.
ubuntu@ip-172-31-85-199:/var/www/html$ mysql -uroot -pルートのパスワード -h localhost webapp < insert_data.sql
mysql: [Warning] Using a password on the command line interface can be insecure.
```

このようにすることで、`mysql`に入ることなく、SQL を実行することができます。

## 問題

Q, 上記のコマンドの`<`はどのような意味でしょうか。
また、`<`を使わずにコマンドを書くとするとどのようなコマンドになりますか。`|`を使って書いてみてください。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

## 確認

すべての穴埋めを行い、コマンドの実行が完了したら、以下のコマンドを実行してください。

```sh
$ grech check chapter "mysql"
```
