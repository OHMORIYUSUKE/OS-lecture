### ファイルが消されてる！！書き換えられているファイルも！！

> ここではパーミッションについて説明します。

**<img style="vertical-align: middle; margin-right: 10px;" width="70px" src="https://2.bp.blogspot.com/-5IJtiKXpDeY/UWvSxKcoX9I/AAAAAAAAQdA/ijapKp-yVHA/s1600/ojisan2.png" />上司**

大変だ！！今すぐ対処してほしい！
とりあえず、ファイルの権限について教えるよ！

| アクセス権 | 表記 | 説明                 |
| ---------- | ---- | -------------------- |
| 読み取り   | r 　 | ファイルの読み取り   |
| 書き込み   | w 　 | ファイルへの書き込み |
| 実行       | x 　 | ファイルの実行       |

これで、自分以外のユーザーが編集実行できなくなるよ。

**<img style="vertical-align: middle; margin-right: 10px;" width="70px" src="https://2.bp.blogspot.com/-wTnACm8RQWE/WKFjAjOt3BI/AAAAAAABBsE/kEpLST61swU6wKLd2vnbI7ixVGMx3562gCLcB/s800/face_smile_woman3.png" />あなた**

そんなメリットがあるのですね！設定してみます。`chmod`コマンドを使うのかな？

所有者とグループ、その他のユーザー？

| 記号表記 | 2 進数 | 8 進数 |
| -------- | ------ | ------ |
| ---      | 000    | 0      |
| --x      | 001    | 1      |
| -w-      | 010    | 2      |
| -wx      | 011    | 3      |
| r--      | 100    | 4      |
| r-x      | 101    | 5      |
| rw-      | 110    | 6      |
| rwx      | 111    | 7      |
