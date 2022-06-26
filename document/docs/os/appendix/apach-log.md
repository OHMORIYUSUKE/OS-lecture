# ログを見る

## Apach

`/var/log/apache2`の中の`error.log`に出力されます。

```sh
ubuntu@ip-172-31-85-199:/var/www/html$ cat /var/log/apache2/error.log
```

でログを見ることができます。

IP アドレスをブラウザに入力してもアクセスできない場合や**500 エラー**や**403 エラー**になる場合は確認しましょう。

## 例

```log
[Sat Jun 25 07:19:03.355668 2022] [cgi:error] [pid 13781] [client 153.173.28.0:24982] AH01215: (13)Permission denied: exec of '/var/www/html/index.pl' failed: /var/www/html/index.pl
```

このようなエラーの場合は、`Permission denied`なので、[パーミッション](../security/permission.md)が原因であることが予想されます。ファイルやディレクトリの権限を変更してみましょう。

その他のユーザー権限に**実行権限**と**読み取り権限**を与えると解決すると思います。
