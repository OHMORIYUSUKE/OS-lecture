## MySQL の設定

MySQL の初期設定は安全ではない設定があるので、変更していきます。

!!! Question

    MySQLについて解説しています。
    [MySQLについて](../middleware/database.md)

## root ユーザーのパスワードの変更

## 課題

mysql に root ユーザーで入りましょう。

## root ユーザーにパスワードを設定

初期設定では、root ユーザーにパスワードが設定されていません。root ユーザーにパスワードを設定していきます。

```sh
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'ルートのパスワード';
```

上記のコマンドの`ルートのパスワード`を好きなパスワードに変更してください。

!!! note

    `root`のような簡単なパスワードは設定できません。
    ```sh
    mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'root';
    ERROR 1819 (HY000): Your password does not satisfy the current policy requirements
    mysql>
    ```
    特殊文字(#$%&など)、大文字(ABCなど)、小文字(abcなど)、数字(123など)を用いるかつ、8文字以上のパスワードにしてください。

    https://dev.mysql.com/doc/refman/8.0/ja/validate-password.html

今回は、MySQL の root ユーザーのパスワードに**ルートのパスワード**を設定します。好きなパスワードを設定してください。

```sh
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'ルートのパスワード';
Query OK, 0 rows affected (0.15 sec)

mysql>
```

!!! note

    これ以降は、MySQLのrootユーザーのパスワードは`ルートのパスワード`と表記します。

### 初期設定を変更しセキュリティを向上させる

`mysql_secure_installation`コマンドにより、MySQL に安全な設定をコマンドから対話的に行います。

```sh
ubuntu@ip-172-31-85-199:~$ sudo mysql_secure_installation

Securing the MySQL server deployment.

Enter password for user root:
The 'validate_password' component is installed on the server.
The subsequent steps will run with the existing configuration
of the component.
Using existing password for root.

Estimated strength of the password: 100
Change the password for root ? ((Press y|Y for Yes, any other key for No) : n

 ... skipping.
By default, a MySQL installation has an anonymous user,
allowing anyone to log into MySQL without having to have
a user account created for them. This is intended only for
testing, and to make the installation go a bit smoother.
You should remove them before moving into a production
environment.

Remove anonymous users? (Press y|Y for Yes, any other key for No) : Y
Success.


Normally, root should only be allowed to connect from
'localhost'. This ensures that someone cannot guess at
the root password from the network.

Disallow root login remotely? (Press y|Y for Yes, any other key for No) : Y
Success.

By default, MySQL comes with a database named 'test' that
anyone can access. This is also intended only for testing,
and should be removed before moving into a production
environment.


Remove test database and access to it? (Press y|Y for Yes, any other key for No) : Y
 - Dropping test database...
Success.

 - Removing privileges on test database...
Success.

Reloading the privilege tables will ensure that all changes
made so far will take effect immediately.

Reload privilege tables now? (Press y|Y for Yes, any other key for No) : Y
Success.

All done!
```

#### 設定の詳細

1. `Change the password for root ? ((Press y|Y for Yes, any other key for No) : n`
   root ユーザーのパスワードを変更するかどうか。しない。
2. `Remove anonymous users? (Press y|Y for Yes, any other key for No) : Y`
   誰でも MySQL にログインできる状態をできないように変更する。
3. `Disallow root login remotely? (Press y|Y for Yes, any other key for No) : Y`
   root ユーザーのサーバー外からのアクセスを拒否する。
4. `Remove test database and access to it? (Press y|Y for Yes, any other key for No) : Y`
   test データベースを作成しない。
5. `Reload privilege tables now? (Press y|Y for Yes, any other key for No) : Y`
   設定を即時反映させる。

## MySQL に入る

```sh
ubuntu@ip-172-31-85-199:/etc$ mysql -uroot -pルートのパスワード
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 12
Server version: 8.0.29-0ubuntu0.22.04.2 (Ubuntu)

Copyright (c) 2000, 2022, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```

`mysql -uroot -pルートのパスワード`を入力する。

先ほど、MySQL の root ユーザーに設定したパスワード(ルートのパスワード)を引数で渡し、MySQL に入る。

`-u`はユーザー名を示しており、`-p`はユーザーのパスワードを示しています。

## 確認

すべての穴埋めを行い、コマンドの実行が完了したら、以下のコマンドを実行してください。

```sh
$ grech check chapter "mysql_init"
```

間違っていたら、該当箇所を確認してください。
