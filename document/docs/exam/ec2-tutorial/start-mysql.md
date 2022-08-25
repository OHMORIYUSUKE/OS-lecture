# MySQL を準備

## MySQL をインストール

オープンソースの SQL リレーショナルデータベース管理システムです。

!!! Question

    データベースについて解説しています。
    [データベースとは](../middleware/database.md)

### インストール

```sh
ubuntu@ip-172-31-85-199:~$ ____ ___ _______ ____________
Reading package lists... Done
Building dependency tree... Done
Reading state information... Done
The following additional packages will be installed:
  libcgi-fast-perl libcgi-pm-perl libclone-perl libencode-locale-perl libevent-pthreads-2.1-7 libfcgi-bin
  libfcgi-perl libfcgi0ldbl libhtml-parser-perl libhtml-tagset-perl libhtml-template-perl libhttp-date-perl
  libhttp-message-perl libio-html-perl liblwp-mediatypes-perl libmecab2 libprotobuf-lite23 libtimedate-perl
  liburi-perl mecab-ipadic mecab-ipadic-utf8 mecab-utils mysql-client-8.0 mysql-client-core-8.0 mysql-common
  mysql-server-8.0 mysql-server-core-8.0
Suggested packages:
  libdata-dump-perl libipc-sharedcache-perl libbusiness-isbn-perl libwww-perl mailx tinyca
The following NEW packages will be installed:
  libcgi-fast-perl libcgi-pm-perl libclone-perl libencode-locale-perl libevent-pthreads-2.1-7 libfcgi-bin
  libfcgi-perl libfcgi0ldbl libhtml-parser-perl libhtml-tagset-perl libhtml-template-perl libhttp-date-perl
  libhttp-message-perl libio-html-perl liblwp-mediatypes-perl libmecab2 libprotobuf-lite23 libtimedate-perl
  liburi-perl mecab-ipadic mecab-ipadic-utf8 mecab-utils mysql-client-8.0 mysql-client-core-8.0 mysql-common
  mysql-server mysql-server-8.0 mysql-server-core-8.0
0 upgraded, 28 newly installed, 0 to remove and 22 not upgraded.
Need to get 28.6 MB of archives.
After this operation, 240 MB of additional disk space will be used.
Do you want to continue? [Y/n] Y
Get:1 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 mysql-common all 5.8+1.0.8 [7212 B]
Get:2 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 mysql-client-core-8.0 amd64 8.0.29-0ubuntu0.22.04.2 [2483 kB]
Get:3 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 mysql-client-8.0 amd64 8.0.29-0ubuntu0.22.04.2 [22.7 kB]
Get:4 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libevent-pthreads-2.1-7 amd64 2.1.12-stable-1build3 [7642 B]
Get:5 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libmecab2 amd64 0.996-14build9 [199 kB]
Get:6 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libprotobuf-lite23 amd64 3.12.4-1ubuntu7 [208
kB]
Get:7 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 mysql-server-core-8.0 amd64 8.0.29-0ubuntu0.22.04.2 [16.9 MB]
Get:8 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 mysql-server-8.0 amd64 8.0.29-0ubuntu0.22.04.2 [1391 kB]
Get:9 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libhtml-tagset-perl all 3.20-4 [12.5 kB]
Get:10 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 liburi-perl all 5.10-1 [78.8 kB]
Get:11 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libhtml-parser-perl amd64 3.76-1build2 [88.4
kB]
Get:12 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libcgi-pm-perl all 4.54-1 [188 kB]
Get:13 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libfcgi0ldbl amd64 2.4.2-2build2 [28.0 kB]
Get:14 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libfcgi-perl amd64 0.82+ds-1build1 [22.8 kB]
Get:15 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libcgi-fast-perl all 1:2.15-1 [10.5 kB]
Get:16 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libclone-perl amd64 0.45-1build3 [11.0 kB]
Get:17 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libencode-locale-perl all 1.05-1.1 [11.8 kB]
Get:18 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libfcgi-bin amd64 2.4.2-2build2 [11.2 kB]
Get:19 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libhtml-template-perl all 2.97-1.1 [59.1 kB]
Setting up libhttp-message-perl (6.36-1) ...
Setting up mysql-server-8.0 (8.0.29-0ubuntu0.22.04.2) ...
update-alternatives: using /etc/mysql/mysql.cnf to provide /etc/mysql/my.cnf (my.cnf) in auto mode
Renaming removed key_buffer and myisam-recover options (if present)
mysqld will log errors to /var/log/mysql/error.log
mysqld is running as pid 1607
Created symlink /etc/systemd/system/multi-user.target.wants/mysql.service → /lib/systemd/system/mysql.service.
Setting up libcgi-pm-perl (4.54-1) ...
Setting up libhtml-template-perl (2.97-1.1) ...
Setting up mysql-server (8.0.29-0ubuntu0.22.04.2) ...
Setting up libcgi-fast-perl (1:2.15-1) ...
Processing triggers for man-db (2.10.2-1) ...
Processing triggers for libc-bin (2.35-0ubuntu3) ...
Scanning processes...
Scanning linux images...

Running kernel seems to be up-to-date.

No services need to be restarted.

No containers need to be restarted.

No user sessions are running outdated binaries.

No VM guests are running outdated hypervisor (qemu) binaries on this host.
```

`apt`コマンドで`mysql-server`をインストールします。

!!! Question

    パッケージ管理について解説しています。
    [APT コマンドについて](../linux/packages.md)

### 確認

```sh
ubuntu@ip-172-31-85-199:~$ mysql --version
mysql  Ver 8.0.29-0ubuntu0.22.04.2 for Linux on x86_64 ((Ubuntu))
```

MySQL がインストールされていることが確認できます。

!!! Question

    コマンドについて解説しています。
    [コマンドについて](../linux/cmd-tutorial.md)

    CLIについて解説しています。
    [CLIについて](../linux/cli-gui.md)

### 接続

```sh
ubuntu@ip-172-31-85-199:~$ sudo mysql
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 8
Server version: 8.0.29-0ubuntu0.22.04.2 (Ubuntu)

Copyright (c) 2000, 2022, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```

MySQL に接続されていることが確認できます。`mysql>`に SQL を入力してテーブル作成などを行います。

ここに、SQL を入力することで、データベースを操作することができます。

!!! note

    ちなみに、
    ```sh
    ubuntu@ip-172-31-85-199:/var/log/mysql$ sudo mysql -uroot
    Enter password:
    ```
    と実行すると`root`ユーザーでmysqlに入ることができます。
    (MySQLにrootで入るには、rootユーザーで実行する必要がある。)

    `-u`:`root`ユーザーで入ることを指定
    (`Enter password:`も入力せずにエンターを入力)

!!! Danger

    MySQLをrootでアプリケーションから操作することは危険です。ユーザーを作成して、操作しましょう。
    SQLインジェクションなどで被害にあう可能性が高まります。
    「安全なウェブサイトの作り方 - 1.1 SQLインジェクション」
    https://www.ipa.go.jp/security/vuln/websecurity-HTML-1_1.html

### MySQL を抜ける

```sh
mysql> exit
Bye
ubuntu@ip-172-31-85-199:/var/log/mysql$
```

`mysql>`で`exit`と入力する。これで、mysql のコマンドラインから抜けることができます。

## 確認

すべての穴埋めを行い、コマンドの実行が完了したら、以下のコマンドを実行してください。

```sh
$ grech check chapter "mysql_dl"
```
