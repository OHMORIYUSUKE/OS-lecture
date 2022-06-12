# SSH 接続

## SSH で接続する

手元の PC から EC2 に接続する。

```sh
ssh -i labsuser.pem ubuntu@12.34.567.890
```

上記のコマンドでアクセスできる。

`-i`は SSH の秘密鍵のファイルを指定する。
`ubuntu`は SSH する際のユーザー名を指定する。
`12.34.567.890`は IP アドレスである。自身の EC2 の IP アドレスに書き換えて実行してください。

---

ターミナルの感じが変化したと思います。これで EC2 に接続できました。

## コマンドを入力する

```sh
ubuntu@ip-172-31-85-199:~$ whoami
ubuntu
```

今のユーザー名を確認しています。

```sh
ubuntu@ip-172-31-85-199:~$ pwd
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
