# Zenn 記事

アドカレです。ごめんなさい 🙇
cistLT Advent Calendar 2021
https://adventar.org/calendars/6520
LOCAL Students Advent Calendar 2021
https://adventar.org/calendars/6552

## つくったもの

プログラミング言語をブラウザから実行できるアプリケーションを作りました。

https://github.com/OHMORIYUSUKE/play-langs

![](https://storage.googleapis.com/zenn-user-upload/fc13dfff31c0-20211230.png)

![](https://storage.googleapis.com/zenn-user-upload/3f6aff1031e4-20211230.png)

![](https://storage.googleapis.com/zenn-user-upload/1b3501847695-20211230.png)

参考
https://qiita.com/tttamaki/items/2b009aa957cfa4895d50

## アプリについて

言語を選択し、コードを入力、入力がある場合は入力与え、実行ボタンを押すと実行され、結果が表示されます。また、入力された処理が 3 秒以上かかるものは、強制終了するようにしています。

以下の 9 種類の言語を実行できます。

```
c
cpp
shell
ruby
haskell
python
java
go
javascript
```

## 使用技術

### フロントエンド

- React
- material ui
- react-monaco-editor

### バックエンド

- Python
- flask
- uwsgi

Docker を用いて開発しており、バックエンドコンテナの Debian 環境で 9 種類の言語を実行しています。

## 仕組み

簡単な図

![](https://storage.googleapis.com/zenn-user-upload/9a1c61d95aeb-20211230.png)

バックエンドは debian に Python と uwsgi,flask,その他言語をインストールする。

```Dockerfile
FROM debian

RUN apt-get update && apt-get install -y -q sudo

########################################################################
# Cの環境構築
RUN sudo apt-get install -y -q gcc
# Javaの環境構築
RUN sudo apt-get install -y -q default-jre
RUN sudo apt install -y -q default-jdk
# goの環境構築
RUN sudo apt-get install -y -q golang-go
# rubyの環境構築
RUN sudo apt-get install -y -q ruby
# nodeの環境構築
RUN sudo apt-get install -y -q nodejs
# Haskellの環境構築
RUN sudo apt-get install -y -q haskell-platform
# Pythonの環境構築
RUN sudo apt-get install -y -q python3
#######################################################################
# pip3コマンドをインストール
RUN sudo apt install -y -q python3-pip

# 文字コード
ENV LANG C.UTF-8
ENV TZ Asia/Tokyo

# uwsgiでPythonのアプリケーションを配置するディレクトリ
COPY ./python /var/www

# 作業ディレクトリ
WORKDIR /var/www/
RUN pip3 install --upgrade pip

RUN pip3 install -r requirements.txt

# uwsgiを実行するコマンド
CMD ["uwsgi","--ini","/var/www/uwsgi.ini"]
```

フロントエンドから POST された実行したいコードのデータを`hoge.py`に書き込み、以下のコードを実行すると、`python3 hoge.py < input.in`が実行することができる。`input.in`には、フロントエンドから POST された入力データを書き込んでおく。

```python
proc = subprocess.run("python3 hoge.py < input.in", timeout=3, shell=True, stdout=PIPE, stderr=PIPE, text=True)
out = proc.stdout #実行結果
err = proc.stderr #エラー内容
```

https://docs.python.org/ja/3/library/subprocess.html

### 苦戦したところ

何か挙動がおかしかった。

```
POSTされた実行プログラムのデータをファイルに書き込む -> プログラムファイルをsubprocessで実行する。 -> proc.stdoutがnull
```

ダメなコード

```python
@app.route("/api/v1/play", methods=['GET','POST'])
def main():
  write_posted_code()
  run_posted_code()
```

想定した挙動のコード

- `write_posted_code()`の実行が終了したら、`run_posted_code()`が実行される。

```
POSTされた実行プログラムのデータをファイルに書き込む -(完了)-> プログラムファイルをsubprocessで実行する。 -> proc.stdoutにstring
```

```python
@app.route("/api/v1/play", methods=['GET','POST'])
def main():
  loop = asyncio.get_event_loop()
  loop.create_task(write_posted_code())
  result = loop.run_until_complete(run_posted_code())
```

おそらく、ファイルに書き込みが終了する前に、subprocess で shell が実行されてしまったため、空のファイルを実行し、null が返ったと思う。多分。

https://docs.python.org/ja/3.10/library/asyncio-eventloop.html

Docker がインストールされていれば、動作するので、遊んでください。

https://github.com/OHMORIYUSUKE/play-langs
