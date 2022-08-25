# WEB サーバーとは

Web サーバーとは、パソコンやスマートフォンなどの端末から HTTP/HTTPS で送られたリクエストに対して HTML、CSS、JavaScript などの情報を返す役割を持ったソフトウェアである。

## Apache, Nginx

![](../../assets/images/apache_logo_icon_168630.png){ align=right width="300" }

Apache と Nginx は WEB サーバーとして用いられます。

> こちらの記事が参考になります。
> [図解で解説！！　 Apache、Tomcat ってなんなの？](https://qiita.com/tanayasu1228/items/11e22a18dbfa796745b5)

ユーザーとアプリケーションの橋渡しの役割を担っています。
ユーザーからのアクセスが増加した場合に、待機している複数のアプリケーションサーバーに分散させて処理させることが可能です。

![](../../assets/images/Nginx_logo.svg.png){ align=right width="250" }

!!! info

    Pythonの場合は、**uvicorn**,**uWSGI**
    Javaの場合は、**Tomcat**
    が簡易的なWEBサーバーの役割を担っています。

    Spring BootはTomcatを内包しています。
