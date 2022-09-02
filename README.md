# googleスプレッドシートの設定

公開リンクはシート1，csv形式で指定する．

[[参考:https://laboratory.kazuuu.net/using-php-and-api-to-retrieve-data-from-google-spreadsheets-and-display-it-on-a-website/]]

# 設置手順
## Env.example.phpをコピーしてEnv.phpファイルを作成する．
```
$ cp Env.example.php Env.php
```

## Env.phpの4行目の""の中に公開リンクを入力する

```
'url' => "https://docs.google.com/spreadsheets/d/e/************
```

## index.phpとEnv.phpとSpreadSheet.phpを設置する

## URL?id={id}にアクセスするとスプレッドシートに入力したurlが取得できる

# 補足
[[スプレッドシートの例:https://docs.google.com/spreadsheets/d/e/2PACX-1vQA58JiFKIXQ6sLgIJSg8APxWeg-x2r7sIJZp_fqIJO5El7ay5pFyXtR517j_pl6I26vhPk27TH6-pU/pub?gid=0&single=true&output=csv]]
