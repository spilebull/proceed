## 環境情報.

* PHP version <tt>5.6.16</tt>
* Laravel Framework version <tt>5.2.39</tt>

###### Composer install

`curl -sS https://getcomposer.org/installer | php`

`mv composer.phar /usr/local/bin/composer`

###### Composer コマンド

|コマンド|説明|
|---|---|
|composer create-project laravel/laravel --prefer-dist [プロジェクト名]|Laravel インストール|
|composer update|composer.json の値をインストール及びアップデート|
|composer dump-autoload|名前空間とディレクトリーの関係を再保存|

|コマンド|説明|
|---|---|
|composer install|Laravel 

###### マイグレーション

|コマンド|説明|
|---|---|
|php artisan list|Artisan コマンド 一覧|
|php artisan help [コマンド]|Artisan コマンド 使い方|
|php artisan --version|Laravelバージョン表示|
|php artisan migrate --env=local|実行する設定環境を指定するには--envスイッチを使用|
|php artisan migrate|マイグレーションの実行|
|php artisan migrate:rollback|マイグレーションのロールバック|
|php artisan migrate:reset|すべてのマイグレーションのロールバック|
|php artisan migrate:refresh|databaseを一度削除してもう一度作成し、テーブル再作成|

###### オプション

|オプション|説明|デフォルト|
|---|---|---|
|.env| 【production】 or 【test】 or 【development】環境の設定を使用する場合に使用|development|

###### 実行例

|例|説明|
|---|---|
|php artisan make:migration create_[マイグレーション名]_table|database/migrationsへマイグレーション作成|
|php artisan make:model [モデル名]|モデル作成|
|php artisan make:controller [コントローラ名]Controller|コントローラ作成|
|php artisan make:seeder [シード名]TableSeeder|シードファイル作成|
|php artisan db:seed|database/seeds内のファイルからdatabaseにデータ作成|
|php artisan db:seed --class=[シード名]|database/seeds内の指定ファイルからdatabaseにデータ作成|
|php artisan migrate:refresh --seed|databaseを一度削除してもう一度作成し、データ再作成|
|php artisan cache:clear|Laravelのキャッシュクリア|

###### 命名規則

|処理|Model|View|Controller|
|---|---|---|---|
|一覧|-|index.blade.php|index()|
|詳細|-|show.blade.php|show()|
|登録|create()|register.blade.php|register()|
|編集|update()|edit.blade.php|edit()|
|削除|delete()|destroy.blade.php|destroy()|
|-|単数形 キャメル(User)|単数形 キャメル(index/show/register/edit/destory)|複数形 キャメル(UsersController)|

## 設定手順.

#### インストール.
`$ git clone https://github.com/te-koyama/proceed.git`

`$ cd proceed`

#### 実行する設定環境を設定.
`$ composer update`

#### key:generate設定.
`$ php artisan key:generate`

#### 実行する設定環境を指定.
`$ php artisan migrate --env=production`

#### データベースのマイグレーション.
`$ php artisan migrate`

#### データベースのシード(DB登録).
`$ php artisan db:seed`

#### テスト起動.
`$ php artisan serve`

<a href="http://localhost:8000">http://localhost:8000</a>

|Email|Password|
|---|---|
|---|---|
