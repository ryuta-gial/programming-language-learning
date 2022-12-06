```

ターミナルでdbフォルダに移動して作業
■コンテナをビルドして起動
docker-compose up --build

・実行中のコンテナを確認する
$ sudo docker ps -a

・別タブでターミナルを開いてコンテナに入る
sudo docker exec -i -t ・・・・ sh

■DBサーバー側設定(postgres)
$ sudo apt-get install curl ca-certificates gnupg
$ curl https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add-
$ sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt $（lsb_release -cs）-pgdg main"> /etc/apt/sources.list.d/pgdg.list'
$ sudo apt-get update
$ sudo apt upgrade
$ y 
$ sudo apt-get install postgresql-11
$ y, 6,79
//シェル設定(十字キーがおかしい)
$ chsh  
$ enter

※改善されない場合は下記も
$ dpkg-reconfigure bash
$ ln -sf /bin/bash /bin/sh
$ chsh -s /bin/bash

//ここで再ログイン
exit
sudo docker exec -i -t ・・・・ sh

//postgre起動
$ /etc/init.d/postgresql start
//postgre停止
$ /etc/init.d/postgresql stop
//再起動 confファイルを編集したら必ず
$ /etc/init.d/postgresql reload

//postgresユーザーのパスワード設定
$ sudo passwd postgres
//自動で作成されるユーザーでログイン
$ su - postgres
$ psql
Type "help" for help.
postgres=# 
//新しいユーザー追加
$ create role yama LOGIN CREATEDB PASSWORD 'yama';

//新しいユーザーでログ・・
$  psql --username yama --password
Password: 
psql: FATAL:  Peer authentication failed for user "yama"

//設定ファイル修正(再起動必ず)
$ vim /etc/postgresql/11/main/pg_hba.conf 
# "local" is for Unix domain socket connections only
# local   all             all                                     peer
local   all             all                                     trust

//仮のデータベース作成
$ create database yama owner yama;

//作ったユーザーでログイン
$ psql -U yama postgres

//データベースを作成
$CREATE DATABASE hello_database;

//ログアウトして、作ったDBにログイン
$ psql -U yama hello_database

//テーブルを作成
$ CREATE TABLE login( id SERIAL PRIMARY KEY,idname VARCHAR(30), pass VARCHAR(30));

//確認
postgres=> \dt
       List of relations
 Schema | Name  | Type  | Owner 
--------+-------+-------+-------
 public | login | table | yama

//仮データ挿入
$ INSERT INTO login (idname, pass) VALUES ('shimizu','p');

//確認
select * from login;

```

完了 ローカルで起動したクライアントAppからログイン処理を投げる。
