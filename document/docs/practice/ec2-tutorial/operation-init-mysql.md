## MySQL の設定

MySQL の初期設定は安全ではない設定があるので、変更していきます。

!!! Question

    MySQLについて解説しています。
    [MySQLについて](../middleware/database.md)

## root ユーザーのパスワードの変更

初期設定では、root ユーザーにパスワードが設定されていません。root ユーザーにパスワードを設定していきます。

```sh
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by '{password}';
```

上記のコマンドの`{password}`を好きなパスワードに変更してください。

!!! note

    `root`のような簡単なパスワードは設定できません。
    ```sh
    mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'root';
    ERROR 1819 (HY000): Your password does not satisfy the current policy requirements
    mysql>
    ```
    特殊文字(#$%&など)、大文字(ABCなど)、小文字(abcなど)、数字(123など)を用いるかつ、8文字以上のパスワードにしてください。

今回は、MySQL の root ユーザーのパスワードに**qaz123WSX$**を設定します。

```sh
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'qaz123WSX$';
Query OK, 0 rows affected (0.15 sec)

mysql>
```

!!! note

    これ以降は、MySQLのrootユーザーのパスワードは`qaz123WSX$`と表記します。

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
ubuntu@ip-172-31-85-199:/etc$ mysql -uroot -pqaz123WSX$
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

`mysql -uroot -p{password}`を入力する。

先ほど、MySQL の root ユーザーに設定したパスワード(qaz123WSX$)を引数で渡し、MySQL に入る。

`-u`はユーザー名を示しており、`-p`はユーザーのパスワードを示しています。

> 資料と同じパスワードの人は、`mysql -uroot -pqaz123WSX$`で入ることができます。

### 初期設定を確認

```sh
mysql>  show variables like '%char%';
+--------------------------------------+----------------------------+
| Variable_name                        | Value                      |
+--------------------------------------+----------------------------+
| character_set_client                 | utf8mb4                    |
| character_set_connection             | utf8mb4                    |
| character_set_database               | utf8mb4                    |
| character_set_filesystem             | binary                     |
| character_set_results                | utf8mb4                    |
| character_set_server                 | utf8mb4                    |
| character_set_system                 | utf8mb3                    |
| character_sets_dir                   | /usr/share/mysql/charsets/ |
| validate_password.special_char_count | 1                          |
+--------------------------------------+----------------------------+
9 rows in set (0.00 sec)

mysql>  show variables like '%storage%';
+---------------------------------+-----------+
| Variable_name                   | Value     |
+---------------------------------+-----------+
| default_storage_engine          | InnoDB    |
| default_tmp_storage_engine      | InnoDB    |
| disabled_storage_engines        |           |
| internal_tmp_mem_storage_engine | TempTable |
+---------------------------------+-----------+
4 rows in set (0.00 sec)
```

1. `show variables like '%char%';`
   文字コードの設定を確認しています。(MySQL version 8.0 では utf8mb4 が設定されています。)
2. `show variables like '%storage%';`
   ストレージエンジンの指定を確認しています。(MySQL version 8.0 では InnoDB が設定されています。)
