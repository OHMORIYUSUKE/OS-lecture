# EC2 インスタンスを作成

!!! Question

    EC2について解説しています。
    [EC2について](../aws/ec2.md)

EC2 インスタンス作成の画面です。以下のように設定してください。

![aws_ec2_make.png](../../assets/images/aws_ec2_make.png){ width="1000" }

1. web
2. Ubuntu
3. vockey

のみ変更

## SSH 鍵を取得

![](../../assets/images/ssh_key.png)

ここから取得

1. aws diteils をクリック
2. Download pem をクリック

!!! Danger

    ダウンロードしたSSHの秘密鍵は絶対に公開しないようにしましょう。
    GitHubなどにPushしないようにしましょう。

## 問題

Q, なぜ、秘密鍵は公開してはいけないのでしょうか。

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

    SSHについて解説しています。
    [SSHとは(公開鍵・秘密鍵)](../security/ssh.md)

---

## EC2 のセキュリティの設定

### EC2 の情報画面

![](../../assets/images/ipaddress.png)

EC2 の IP アドレスなどの情報が記載されています。この後解説する SSH で接続する際に、この IP アドレスを用いてアクセスします。
そのため、この画面はよく見る画面です。

!!! Question

    IPアドレスについて解説しています。
    [IPアドレス](../security/ip.md)

### デフォルトのポートの許可

![](../../assets/images/ssh_only.png)

上の画像の画面を下にスクロールすると、このような画面になります。この画面で、EC2 に対して、アクセス許可されているプロトコルとポートが記載されています。

デフォルトでは、**22**番ポートの**TCP**が許可されています。

## 問題

Q, なぜ、22 番 TCP を許可するのでしょうか。

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

    ポートについて解説しています。
    [ポートとは](../security/port.md)

### ポートの許可

![](../../assets/images/incom_config.png)

**TCP**の**80**番ポートを許可する設定を追加します。

## 問題

Q, なぜ、80 番 TCP を許可するのでしょうか。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

Q, なぜ、ソースで`0.0.0.0/0`を指定するのでしょうか。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

Q, HTTPS で WEB サービスを公開したい場合は、何番ポートを許可しますか。

<form action="" method="post">
<label for="story">回答</label>
<textarea id="story" name="story"
          rows="10" style="width: 100%;">
</textarea>
<div>
    <input type="submit" value="送信">
</div>
</form>

!!! note

    WEBサーバーでコンテンツを公開するので、**TCP**の**80**番ポートを許可する設定を追加します。
    ブラウザからIPアドレスを入力することで、EC2で起動されているWEBサーバーの画面が表示されます。

### 変更後

![](../../assets/images/incoming.png)

デフォルトの設定に加えて、**TCP**の**80**番ポートを許可する設定が追加されています。
