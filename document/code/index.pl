#! /usr/bin/perl

use CGI;

my $query = CGI -> new;
# 名前検索

my $v1 = $query -> param('value1');
my $v2 = $query -> param('value2');

print "Content-Type: text/html; charset=UTF-8;\n\n";

my $html = <<"EOF";
<!DOCTYPE html>
<html>
    <head><meta charset="utf-8" /></head>
<body bgcolor="lightyellow">
    <h1>こんにちは</h1>
    <p>入力値の積は %s<br/></p>
    <hr/>
    <a href="test.html">戻る</a>
</body>
</html>
EOF

my $ans = $v1 * $v2;

$html =~ s/%s/$ans/;

print $html;
