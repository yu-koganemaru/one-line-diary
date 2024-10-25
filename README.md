# one-line-diary

## 環境
・php8.2

・MySQL8.0

・Laravel Framework 11.28.0

・docker

・phpMyAdmin

## 環境構築
```
// コンテナの立ち上げ
$docker compose up -d

// コンテナへ入る
$docker compose exec app sh

// 画像表示用にストレージへシンボリックリンクを貼る
$php artisan storage:link
```
### アクセス
サービス：http://localhost:80

phpMyAdmin：http://localhost:4040

## 補足など
・/src配下がLaravelのソースになります。

・サービス、リポジトリパターンを採用しています。

・認証機能、テスト、確認用のファクトリなど時間捻出の関係で断念した部分がいくつかあります。

・投稿、投稿画像テーブルを分けたのは、今後１投稿に対して添付する画像が増えそう、と思ったのとリレーションを書きたかったからです。

・ブランチ、コミット、PRに関してはもっと綺麗に書けたな...と大反省しております。

