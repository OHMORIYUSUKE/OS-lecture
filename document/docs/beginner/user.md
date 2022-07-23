## 後輩が配属されました。

> ここでは**ユーザーの作成**について解説します。
> ユーザーを作成するために必要なコマンドや知識について解説します。

## 登場人物

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

あなたの上司です。コマンド操作が得意です。

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

普段は windows を使っており、Linux サーバーはほとんど使ったことがありません。

## 会話

### ユーザーとは

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「君に後輩ができたぞ。後輩の名前は**太郎**君だ！君に、後輩のために後輩用の**ユーザー**を作成して欲しい。」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「コンピュータに**ユーザー**が複数存在するのでしょうか？」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「そうだよ。君は**ubuntu**ユーザーとして操作しているじゃないか。**ubuntu**ユーザーは Ubuntu のインスタンスを作成した時点で作成されているユーザーなんだよ。」

「試しに`whoami`コマンドを打ってみな。これは現在、操作しているユーザーを表示するコマンドだよ。」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

```sh
ubuntu@ip-172-31-85-199:~$ whoami
ubuntu
```

「出ました。私は`ubuntu`ユーザーとして操作していました。」

(**ユーザー**を作ろう！`adduser`コマンドを用いると**ユーザー**が作れるのか)

(後輩の名前は**太郎**だからユーザー名も`tarou`でいいか。)

```sh
ubuntu@ip-172-31-85-199:~$ adduser tarou
adduser: Only root may add a user or group to the system.
```

(`tarou`(後輩)ユーザーを作成しようとしたらエラーが...どうして...)

### `root`ユーザーとは

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「**ユーザー**を作ろうとしたところエラーになってしまいました。」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「`root`ユーザーで**ユーザー**を作成しないと。」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「`root`ユーザー...ですか...？」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「`root`ユーザーというものが Linux には存在していて、`root`ユーザーは Linux で最も権限があるユーザーで、なんでもできるユーザーだ！」

「今回の**ユーザー**を作ることや、システムの管理なども`root`で行うんだ。」

「`sudo`コマンドを使うと`root`ユーザーとしてコマンドを実行できるぞ。気軽に`sudo`を使ってはいけないよ。なんでもできてしまうからね。。。」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「分かりました！`sudo コマンド`でユーザーを作成してみます。」

```sh
ubuntu@ip-172-31-85-199:~$ sudo adduser tarou
Adding user `tarou' ...
Adding new group `tarou' (1001) ...
Adding new user `tarou' (1001) with group `tarou' ...
Creating home directory `/home/tarou' ...
Copying files from `/etc/skel' ...
New password:
Retype new password:
passwd: password updated successfully
Changing the user information for tarou
Enter the new value, or press ENTER for the default
        Full Name []:
        Room Number []:
        Work Phone []:
        Home Phone []:
        Other []:
Is the information correct? [Y/n] Y
```

> 今回はすべてエンターで進みます。

(とりあえず、太郎(tarou)君のフルネームも電話番号も知らないから全部エンターでいいや。)

> `Room Number []:`は大学の所属部屋の番号などを入力するらしいです。
> https://www.quora.com/Why-does-Linux-ask-for-a-room-number-when-creating-a-user

(なんかできたっぽい)

「ユーザーを作成できました。`tarou`という名前のユーザーを作成しました！」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

`cat /etc/passwd`でユーザー一覧を表示して、`tarou`が存在していることを確認しよう。

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

```sh
ubuntu@ip-172-31-85-199:~$ cat /etc/passwd
root:x:0:0:root:/root:/bin/bash
daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin
(省略)
tarou:x:1001:1001:,,,:/home/tarou:/bin/bash
```

「一番最後に`tarou`がいました！無事ユーザーが作成できました。」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「`cat`コマンドも教えておくよ。`cat`コマンドはファイルの中身を表示させるためによく用いられるよ。」

「今回は`/etc/passwd`というファイルの中身を確認しユーザーが存在しているか確認したよ。このファイルを
見るとこのコンピュータに存在しているユーザーを確認できるぞ。」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「ちょっと待ってください。`/etc/passwd`でどこにあるのでしょうか。そして、ファイル名に`/`は使えないはずでは？？」

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「そうだね。`/etc`ディレクトリの中の`password`ファイルだよ。」

「**ファイル**と**ディレクトリ**は知っているかな？」

**<img class="avatar" src="/assets/images/avatar/face_smile_woman3.png" />あなた**

「ディレクトリ？ファイル？ですか...」

### ディレクトリとファイル

**<img class="avatar" src="/assets/images/avatar/ojisan2.png" />上司**

「君は普段パソコンを操作しているときに下のような画像を見たことないか？」

![](../../assets/images/folder.png)

「これがフォルダであり**ディレクトリ**だ。フォルダの中にフォルダがありその中に...最後に word などの**ファイル**が存在しているだろ。」

「とりあえず**ディレクトリ**と**ファイル**の作り方から勉強しよう。」

!!! note

        つづく
        [ディレクトリとファイル](./dir-file.md)
