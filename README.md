# FFS Web from CakePHP

FFS 結果を共有できるウェブアプリ

## Installation

このリポジトリを clone してください

```
git clone git@github.com:autumnlike/ffs_cakephp.git
```

PHPが動く環境で composer install してください

```
cd /path/to/ffs_cakephp
compoeser install
```

初期データ生成
```
mysql -u xxx -p xxx
create database xxx;
```

スキーマ定義反映
```
bin/cake migrations migrate
```

## ETHOS からの結果データをインポート

ETHOSからデータをダウンロードしてください

(wip) ダウンロード方法を書く
(wip) インポート方法を書く
