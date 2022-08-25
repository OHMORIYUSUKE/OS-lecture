# CLI(Command Line Interface コマンドラインインターフェース)実践

## 解説を行う上での注意

例)

```sh
ubuntu@ip-172-31-85-199:/$ ls
bin   dev  home  lib32  libx32      media  opt   root  sbin  srv  tmp  var
boot  etc  lib   lib64  lost+found  mnt    proc  run   snap  sys  usr
```

コマンドは上記のように示されます。この表現方法を解説します。

- `ubuntu@ip-172-31-85-199`
  `ubuntu`は、現在のユーザー名を示します。
  `ip-172-31-85-199`は、ホスト名を示します。

- `:/$`
  `/`は、現在のディレクトリを示します。
  `$`は、`$`以降がコマンドであることを示します。

- `ls`
  コマンドです。

- ```sh
      bin   dev  home  lib32  libx32      media  opt   root  sbin  srv  tmp  var
      boot  etc  lib   lib64  lost+found  mnt    proc  run   snap  sys  usr
  ```
  **3.**で入力されたコマンドの結果を表示します。

## Linux のコマンド

### `ls`

```sh
ubuntu@ip-172-31-85-199:/$ ls
bin   dev  home  lib32  libx32      media  opt   root  sbin  srv  tmp  var
boot  etc  lib   lib64  lost+found  mnt    proc  run   snap  sys  usr
```

現在のディレクトリに存在するファイル、ディレクトリを出力します。(`ls`を入力し、現在のディレクトリにファイルまたはディレクトリがない場合は何も出力されません。)

### `pwd`

```sh
ubuntu@ip-172-31-85-199:~$ pwd
/home/ubuntu
```

現在のディレクトリの位置を表示します。

### `cd`

```sh
ubuntu@ip-172-31-85-199:/$ cd home/ubuntu/
```

ディレクトリを移動します。今回の場合は、`/`(ルートディレクトリ)から`/home/ubuntu`ディレクトリに移動しています。

!!! note

    ```sh
    ubuntu@ip-172-31-85-199:~$ pwd
    /home/ubuntu
    ```

    現在のディレクトリの場所がわからなくなったら、`pwd`を入力し、現在のディレクトリを確認しましょう。

    ```sh
    ubuntu@ip-172-31-85-199:~$ cd ..
    ```

    `cd ..`とすることで１つ上のディレクトリに移動できます。

### `touch`

```sh
ubuntu@ip-172-31-85-199:~$ touch main.py
ubuntu@ip-172-31-85-199:~$ ls
main.py
```

ファイルを作成することができます。ここでは、`main.py`を作成しています。

### `mkdir`

```sh
ubuntu@ip-172-31-85-199:~$ mkdir os-lecture
ubuntu@ip-172-31-85-199:~$ ls
main.py  os-lecture
```

ディレクトリを作成することができます。ここでは、`os-lecture`ディレクトリを作成しています。

### `cat`

```sh
ubuntu@ip-172-31-85-199:~$ cat main.py
```

ファイルの中身をターミナルに出力することができます。
`main.py`の中身を出力することができます。

### `>`

```sh
ubuntu@ip-172-31-85-199:~$ echo 'print("Hello World !")' > main.py
```

リダイレクトコマンド。`echo`で出力した文字列を`main.py`に書き込みます。

!!! info

    `python3 main.py`を実行してみましょう。
    UbuntuにはPython3がインストールされています。

### `<`

```sh
ubuntu@ip-172-31-85-199:~$ cat < main.py
```

上記の`>`コマンドの逆です。

`main.py`の内容を`cat`コマンドに渡しています。

### `|`

```sh
ubuntu@ip-172-31-85-199:~$ echo 'ls' | sh
```

パイプコマンドです。`|`の前のコマンドの内容を`|`の後のコマンドに渡しています。
`echo 'ls'`で`ls`という文字を出力し、`sh`コマンドに`ls`を渡しています。

!!! note

      `sh`コマンドは、shellとして実行することを示しています。

### `--version`

```sh
ubuntu@ip-172-31-85-199:~$ python3 --version
Python 3.10.4
```

ソフトウェアなどのバージョンを確認するコマンドです。

!!! note

    `--version`や`-V`などソフトウェアによって様々です。

    **うまく動作しないときや、質問する際はバージョンを明記すると、回答者が問題を解決しやすくなることがあります。**

### `rm`

```sh
ubuntu@ip-172-31-85-199:~$ ls
main.py  test
ubuntu@ip-172-31-85-199:~$ rm -r test/
ubuntu@ip-172-31-85-199:~$ ls
main.py
ubuntu@ip-172-31-85-199:~$ rm -f main.py
ubuntu@ip-172-31-85-199:~$ ls
```

ファイル、ディレクトリを削除するコマンドです。
`-r`のオプションでディレクトリを再帰的に削除できます。
`-f`のオプションで強制削除することができます。

### `chmod`

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ sudo chmod 666 index.html
```

ファイルの権限を変更するコマンドです。Linux 特有のコマンドです。
詳細は[こちら](../security/permission.md)で解説しています。

## 補足

```sh
ubuntu@ip-172-31-85-199:~$ echo 'print("Hello World !")' > main.py
```

のコマンドでファイルに入力しましたが、`vi`, `vim`, `emacs`などの CLI エディタを使って記入すると便利です。

!!! note

      ほかにもたくさんのコマンドが存在します。ここでは説明しませんが、出てくるたびに覚えましょう。

## 参考

[Linux TIPS](https://exercises-aws.fml.org/ja/appendix/unix/linux/)
