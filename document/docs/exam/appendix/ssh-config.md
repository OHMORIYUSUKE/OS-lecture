## `~/.ssh/config`

`~/.ssh/config`を書くことで簡単に SSH 接続することができます。

!!! note

    `ssh -i labsuser.pem ubuntu@12.34.567.890`
    毎回、上記のようなコマンドを入力することで、SSH接続していました。
    しかし、`~/.ssh/config`を書くことで、`ssh ec2`のようなコマンドでSSH接続できます。

## Windows の設定

`c:\Users\{ユーザー名}\.ssh`に設定ファイル(`config`)を書きます。また、`labsuser.pem`もここに配置すると便利です。

> `labsuser.pem`は`c:\Users\{ユーザー名}\.ssh`に配置されている前提で解説します。

`config`の解説です。以下のように設定ファイルを書きます。

```config title="c:\Users\ {ユーザー名}\ .ssh\config"
Host 任意の接続名
    HostName ホスト名(IPアドレス)
    User ユーザー名
    Port ポート番号
    IdentityFile SSH鍵へのパス
```

`c:\Users\{ユーザー名}\ .ssh\config`には、SSh に必要な情報を記載します。

1. `Host`は、なんでもかまいません。
   (`ssh ec2`で`ec2`にあたる名前です。今回は、`ec2`を指定します。)
2. `HostName`は、ドメイン名や IP アドレスを書きます。
   (今回は起動している EC2 インスタンスの IP アドレスを書きます。)
3. `User`は、SSH 接続する際のユーザー名を記載します。
   (今回は`ｘｘｘｘｘｘ`を指定します。)
4. `Port`は、SSH 接続する際のポートを指定します。
   (今回は ｘｘ 番ポートを指定します。)
5. `IdentityFile`は、SSH 接続する際の SSh 鍵の場所を書きます。
   (今回は`ｘｘｘｘｘｘｘ/labsuser.pem`を指定します。)

### 確認

```sh
$ ssh ec2
```

と入力し、SSH できるか確認してください。

!!! note

    ファイルパスの`~`は現在ログイン中のユーザーのホームディレクトリの場所を示します。
    つまり、windowsの場合は、`c:\Users\{ユーザー名}`までのパスを`~`で示しています。
