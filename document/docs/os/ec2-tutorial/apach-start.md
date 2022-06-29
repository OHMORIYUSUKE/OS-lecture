# Apach

## APT

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo apt update
Hit:1 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy InRelease
Get:2 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates InRelease [109 kB]
Get:3 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-backports InRelease [99.8 kB]
Get:4 http://security.ubuntu.com/ubuntu jammy-security InRelease [110 kB]
Get:5 https://download.docker.com/linux/ubuntu jammy InRelease [48.9 kB]
Get:6 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 Packages [323 kB]
Get:7 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main Translation-en [78.1 kB]
Get:8 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/main amd64 c-n-f Metadata [5552 B]
Get:9 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/restricted amd64 Packages [194 kB]
Get:10 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/restricted Translation-en [29.5 kB]
Get:11 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/universe amd64 Packages [131 kB]
Get:12 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/universe Translation-en [46.6 kB]
Get:13 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-updates/universe amd64 c-n-f Metadata [2680 B]
Get:14 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-backports/universe amd64 Packages [6552 B]
Get:15 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-backports/universe Translation-en [8064 B]
Get:16 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy-backports/universe amd64 c-n-f Metadata [236 B]
Get:17 http://security.ubuntu.com/ubuntu jammy-security/main amd64 Packages [191 kB]
Get:18 http://security.ubuntu.com/ubuntu jammy-security/main Translation-en [45.9 kB]
Get:19 http://security.ubuntu.com/ubuntu jammy-security/main amd64 c-n-f Metadata [3108 B]
Get:20 http://security.ubuntu.com/ubuntu jammy-security/universe amd64 Packages [78.1 kB]
Get:21 http://security.ubuntu.com/ubuntu jammy-security/universe Translation-en [27.7 kB]
Get:22 http://security.ubuntu.com/ubuntu jammy-security/universe amd64 c-n-f Metadata [1668 B]
Fetched 1541 kB in 1s (2185 kB/s)
Reading package lists... Done
Building dependency tree... Done
Reading state information... Done
25 packages can be upgraded. Run 'apt list --upgradable' to see them.
```

`sudo apt update`により、`apt install`でインストールされるソフトウェアが最新のものになるようにします。

!!! note

    パッケージ管理について解説しています。
    [APT コマンドについて](../linux/packages.md)

## Apach をインストール

```sh
ubuntu@ip-172-31-85-199:~$ sudo apt install apache2
Reading package lists... Done
Building dependency tree... Done
Reading state information... Done
The following additional packages will be installed:
  apache2-bin apache2-data apache2-utils bzip2 libapr1 libaprutil1 libaprutil1-dbd-sqlite3 libaprutil1-ldap
  liblua5.3-0 mailcap mime-support ssl-cert
Suggested packages:
  apache2-doc apache2-suexec-pristine | apache2-suexec-custom www-browser bzip2-doc
The following NEW packages will be installed:
  apache2 apache2-bin apache2-data apache2-utils bzip2 libapr1 libaprutil1 libaprutil1-dbd-sqlite3
  libaprutil1-ldap liblua5.3-0 mailcap mime-support ssl-cert
0 upgraded, 13 newly installed, 0 to remove and 0 not upgraded.
Need to get 2135 kB of archives.
After this operation, 8486 kB of additional disk space will be used.
Do you want to continue? [Y/n] Y
Get:1 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libapr1 amd64 1.7.0-8build1 [107 kB]
Get:2 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libaprutil1 amd64 1.6.1-5ubuntu4 [92.4 kB]
Get:3 http://us-east-1.ec2.archive.ubuntu.com/ubuntu jammy/main amd64 libaprutil1-dbd-sqlite3 amd64 1.6.1-5ubuntu4 [11.3 kB]
Enabling conf localized-error-pages.
Enabling conf other-vhosts-access-log.
Enabling conf security.
Enabling conf serve-cgi-bin.
Enabling site 000-default.
Created symlink /etc/systemd/system/multi-user.target.wants/apache2.service → /lib/systemd/system/apache2.service.
Created symlink /etc/systemd/system/multi-user.target.wants/apache-htcacheclean.service → /lib/systemd/system/apache-htcacheclean.service.
Processing triggers for ufw (0.36.1-4build1) ...
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

`apt`コマンドを用いて Apach をインストールする。

!!! note

    WEBサーバーについて解説しています。
    [Apachについて](../middleware/web-server.md)

## 動作確認

!!! note

    **SSH**接続した際に使った**IP アドレス**をブラウザに入力する。

![](../../assets/images/Apach_defoulte.png)

ブラウザに上記のような画面が出ていることが確認できます。

## ソフトウェアの制御

ソフトウェアの基本的な操作(起動、停止など)を解説します。

### 停止

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl stop apache2
```

Apach を停止する。

### 起動

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl start apache2
```

Apach を起動する。

### 再起動

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl restart apache2
```

Apach を再起動する。

### 設定を読み込み

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl reload apache2
```

Apach の設定の変更を反映する。

### サーバー起動時に起動を無効

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl disable apache2
```

デフォルトでは、Apache はサーバーの起動時に自動的に起動するように設定されています。これを望まない場合は、次のように入力してこの動作を無効にできます。

!!! note

    MySQLも初期設定では、コンピュータ起動時に自動で起動するようになっています。

### サーバー起動時に起動

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo systemctl enable apache2
```

`sudo systemctl disable apache2`を無効化します。

!!! note

    ブラウザにIPアドレスを入力しても画面が表示されない場合は、Apachが起動していないことが考えられます。
    Apachを起動しましょう。
