# gitHub にアップロードする

最後に、作成したアプリケーションのソースコードを GitHub にアップロードします。

## レポジトリを作成する

リポジトリを作成する
https://docs.github.com/ja/get-started/quickstart/create-a-repo

を参考にレポジトリを作成してください。

!!! note

    レポジトリを作成する際に[Initialize this repository with a README] は選択しないでください。

## EC2 から GitHub に SSH 接続する

EC2 内で SSH 鍵を作成します。
`~/.ssh`に移動します。
`-f`で SSH 鍵のファイル名を指定します。github という名前で作成してください。

### 問題

Q, `~`(チルダ)はどのようなディレクトリを示すでしょうか。

**ヒント**
`pwd`や`cd`コマンドを用いて試してみましょう。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

```sh
ubuntu@ip-172-31-85-199:~/.ssh$ __________ -f github
Generating public/private rsa key pair.
Enter passphrase (empty for no passphrase):
Enter same passphrase again:
Your identification has been saved in github
Your public key has been saved in github.pub
The key fingerprint is:
SHA256:71RR1riBd30VdHBsZHT2QZZ/aUH2JROibGScSkPHswY ubuntu@ip-172-31-85-199
The key's randomart image is:
+---[RSA 3072]----+
|       ..o+...@^/|
|        E==..+*O#|
|       . ++o.. =B|
|        ..o  ..oo|
|        S.  . . .|
|         . .     |
|          o      |
|         o       |
|          .      |
+----[SHA256]-----+
```

SSH 鍵の公開鍵である`.pub`の中身をコピーし、GitHub に登録してください。

登録方法
https://docs.github.com/ja/enterprise-server@3.2/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account

```sh
ubuntu@ip-172-31-85-199:~/.ssh$ ___ github.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQC61wt66jVW24odHtZMIJJeAc/2ZrLqKiYi/kk0y+u5jEk0nR+g7bZsJtaBC8sJPYBtkJB/EgTM8c8CIinzhw4Gt2uD3/3VaLOhuZTta9C0NtisEZWXJjbDG8diiu/O1PlysYeIv6OMt5pPZZuad4svGRqMzvnvaPse3b4xWy7QVQgWevoNdAhKzKflL6oxJCXd3Tqlk2IXIisnD7GkaL6jK+mzZpsDMy9b215S0QoJWMF6mjmVRHrZeDbFhMwdzcCX9mu82+q56ycxVi2AIM5GdUpx9k51AV2/kq+xbqcUslVHGEueMtLP0BTTReTook7t2AscWnwJndQYsSKlUxwoVxz1rCvEY16PCON/3FPqpuGAgTfT5I/LNRna5QQkQ51MpkIuoiLsm+xFT7dJ3+oocOFkvDNOVHwNcapVmPzDj8ia3uavmeWwt3o+RsAFWxYZRcEdYRuv7vtF0KVNbjgH3bPzW0Z/g9LiBgBaVWAU45jbN4tjq4iqC3QcMMfj+6U= ubuntu@ip-172-31-85-199
```

SSH の設定を書きます。`config`というファイルを作成し、以下のように書き込んでください。

`IdentityFile`には、SSH の秘密鍵の場所を書きます。

```sh
ubuntu@ip-172-31-85-199:~/.ssh$ sudo vi config
ubuntu@ip-172-31-85-199:~/.ssh$ cat config
Host github.com
  HostName github.com
  User git
  IdentityFile _____________
```

## GitHub に Push する

`ubuntu`ユーザーの home ディレクトリに`/var/www/html`をコピーします。

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ __ __ /var/www/html/ __
```

`~/html`に移動し、コピーできているか確認します。

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ __ ____
ubuntu@ip-172-31-85-199:~/html$ ls
create_table.sql  flask-app  index.html  index.php  index.pl  index.py  insert_data.sql  test.html
```

GitHub に Push します。

```sh
ubuntu@ip-172-31-85-199:~/html$ git init
hint: Using 'master' as the name for the initial branch. This default branch name
hint: is subject to change. To configure the initial branch name to use in all
hint: of your new repositories, which will suppress this warning, call:
hint:
hint:   git config --global init.defaultBranch <name>
hint:
hint: Names commonly chosen instead of 'master' are 'main', 'trunk' and
hint: 'development'. The just-created branch can be renamed via this command:
hint:
hint:   git branch -m <name>
Initialized empty Git repository in /home/ubuntu/html/.git/
ubuntu@ip-172-31-85-199:~/html$ git add .
ubuntu@ip-172-31-85-199:~/html$ git commit -m "first commit"
[master (root-commit) 2bda837] first commit
 Committer: Ubuntu <ubuntu@ip-172-31-85-199.ec2.internal>
Your name and email address were configured automatically based
on your username and hostname. Please check that they are accurate.
You can suppress this message by setting them explicitly:

    git config --global user.name "Your Name"
    git config --global user.email you@example.com

After doing this, you may fix the identity used for this commit with:

    git commit --amend --reset-author

 9 files changed, 189 insertions(+)
 create mode 100755 create_table.sql
 create mode 100755 flask-app/main.py
 create mode 100755 flask-app/uwsgi.ini
 create mode 100644 index.html
 create mode 100755 index.php
 create mode 100755 index.pl
 create mode 100755 index.py
 create mode 100755 insert_data.sql
 create mode 100755 test.html
ubuntu@ip-172-31-85-199:~/html$ git remote add origin git@github.com:OHMORIYUSUKE/ec2_test.git
ubuntu@ip-172-31-85-199:~/html$ git push origin master
Enumerating objects: 12, done.
Counting objects: 100% (12/12), done.
Compressing objects: 100% (11/11), done.
Writing objects: 100% (12/12), 3.14 KiB | 1.57 MiB/s, done.
Total 12 (delta 1), reused 0 (delta 0), pack-reused 0
remote: Resolving deltas: 100% (1/1), done.
To github.com:OHMORIYUSUKE/ec2_test.git
 * [new branch]      master -> master
```

最後に作成したレポジトリを確認し、ソースコードがアップロードされているか確認してください。

## 確認

すべての穴埋めを行い、コマンドの実行が完了したら、以下のコマンドを実行してください。

```sh
$ grech check chapter "git"
```

間違っていたら、該当箇所を確認してください。

### 以上でチュートリアルは終了です。

[PHP のコードの解説はこちらです](./php-tutorial.md)

---

## 付録

PHP 以外にも Python や Perl での解説もあります。

### Python , Perl (CGI)

データベースに接続までは解説しませんが、Python, Perl(CGI)での解説もあります。

[Python(CGI)](../appendix/python.md)
[Perl(CGI)](../appendix/perl.md)
