# FFS Web from CakePHP

FFS 結果を共有できるウェブアプリ

## Installation

このリポジトリを clone してください

```
git clone git@github.com:autumnlike/ffs_cakephp.git
```

Docker 環境構築

```
cd ffs_cakephp
cp config/dotenv_sample config/.env
cd docker
docker compose up -d
```

Hosts 設定

```
$ sudo vi /etc/hosts

# FFS API
127.0.0.1 dev.ffsapi.com
 ```

DB 生成
```
docker exec -it ffsapi-mysql bash
mysql -u root -e 'create database ffs_api'
```

App コンテナ環境

```
docker exec -it ffsapi-app bash
composer install
bin/cake migrations migrate
bin/cake migrations seed
supervisorctl restart app
```

## ETHOS からの結果データをインポート

ETHOSからデータをダウンロードしてください
[ユーザー管理] > [ユーザー一覧] > [検索実行] > [全件CSVダウンロード] > [↓ UTF-8] にて CSVファイルをダウンロード

サンプルファイルは [ETHOS_sample_001.csv](https://github.com/autumnlike/ffs_cakephp/files/10306576/ETHOS_sample_001.csv)

```
cp /path/to/ダウンロードファイル /path/to/ffs_cakephp/tmp/ETHOS.csv
```

データインポート
```
docker exec -it ffsapi-app bash
./bin/cake ImportByEthosCsv
```

http://dev.ffsapi.com/members にて確認
