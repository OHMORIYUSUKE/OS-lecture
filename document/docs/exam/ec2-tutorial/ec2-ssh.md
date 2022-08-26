# SSH 接続

## SSH で接続する

手元の PC から EC2 に接続する。

!!! note

    SSHについて解説しています。
    [SSHとは(公開鍵・秘密鍵)](../security/ssh.md)

```sh
ssh -i labsuser.pem ubuntu@12.34.567.890
```

上記のコマンドでアクセスできる。

`-i`は SSH の秘密鍵のファイルを指定する。
`ubuntu`は SSH する際のユーザー名を指定する。
`12.34.567.890`は IP アドレスである。自身の EC2 の IP アドレスに書き換えて実行してください。

## 問題

Q, IP アドレスが`23.45.678.901`で、ユーザーが`ec2-user`、SSH の秘密鍵が`C:\Users\hoge\Documents\labsuser.pem`にある場合はどのようにコマンドを入力しますか。
※コマンドを複数回打ってもかまいません。複数になる場合は、以下のように入力してください。

```txt
$ コマンド
$ コマンド
```

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

!!! Question

    IPアドレスについて解説しています。
    [IPアドレスとは](../security//ip.md)

!!! info

    `~/.ssh/config`を書くことで、簡単にssh接続することが可能です。
    [SSHの設定](../appendix/ssh-config.md)

---

ターミナルの感じが変化したと思います。これで EC2 に接続できました。

## コマンドを入力する

!!! Question

    コマンドについて解説しています。
    [コマンドについて](../linux/cmd-tutorial.md)

    CLIについて解説しています。
    [CLIについて](../linux/cli-gui.md)

```sh
ubuntu@ip-172-31-85-199:~$ ______
ubuntu
```

今のユーザー名を確認しています。

```sh
ubuntu@ip-172-31-85-199:~$ ___
/home/ubuntu
```

今いるディレクトリの場所を確認しています。

```sh
ubuntu@ip-172-31-85-199:~$ apt -v
apt 2.4.5 (amd64)
Supported modules:
*Ver: Standard .deb
 Pkg:  Debian APT solver interface (Priority -1000)
 Pkg:  Debian APT planner interface (Priority -1000)
*Pkg:  Debian dpkg interface (Priority 30)
 S.L: 'deb' Debian binary tree
 S.L: 'deb-src' Debian source tree
 Idx: EDSP scenario file
 Idx: EIPP scenario file
 Idx: Debian Source Index
 Idx: Debian Package Index
 Idx: Debian Translation Index
 Idx: Debian dpkg status file
 Idx: Debian deb file
 Idx: Debian dsc file
 Idx: Debian control file
```

パッケージ管理コマンドのバージョンを確認しています。

## 問題

Q, `apt`コマンドはどのようなときに使用しますか。１つ回答してください。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

!!! Question

    パッケージ管理について解説しています。
    [パッケージ管理について](../linux/packages.md)

```sh
ubuntu@ip-172-31-85-199:~$ cat /etc/os-release
PRETTY_NAME="Ubuntu 22.04 LTS"
NAME="Ubuntu"
VERSION_ID="22.04"
VERSION="22.04 (Jammy Jellyfish)"
VERSION_CODENAME=jammy
ID=ubuntu
ID_LIKE=debian
HOME_URL="https://www.ubuntu.com/"
SUPPORT_URL="https://help.ubuntu.com/"
BUG_REPORT_URL="https://bugs.launchpad.net/ubuntu/"
PRIVACY_POLICY_URL="https://www.ubuntu.com/legal/terms-and-policies/privacy-policy"
UBUNTU_CODENAME=jammy
```

OS の情報を確認しています。

!!! Question

    UbuntuはLinuxの一種です。
    Linuxについて解説しています。
    [Linuxについて](../linux/packages.md)

## 確認

すべての穴埋めを行い、コマンドの実行が完了したら、以下のコマンドを実行してください。

```sh
$ grech check chapter "cmd"
```

間違っていたら、該当箇所を確認してください。
