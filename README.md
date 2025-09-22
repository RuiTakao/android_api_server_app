## アプリケーション詳細
Android APIテスト用のモックサーバー\
フロントエンドリポジトリ: https://github.com/RuiTakao/AndroidApiApp

## 環境構築
1. プロジェクトインストール
   ```
   git clone https://github.com/RuiTakao/android_api_server_app.git
   ```
2. .envファイル追加
   .envファイルを以下のように作成し、プロジェクトの直下に配置する。
   ```
   MYSQL_ROOT_PASSWORD=rootpass
   MYSQL_DATABASE=test_db
   MYSQL_USER=test_user
   MYSQL_PASSWORD=rootpass
   PMA_HOST=db
   ```
3. app_local.phpファイルの編集
   config/app_local.phpファイルの'Datasources' => []の中身を以下の通りに修正
   ```
   'Datasources' => [
        'default' => [
            'host' => 'db',
            'username' => 'test_user',
            'password' => 'rootpass',
            'database' => 'test_db',
            'url' => env('DATABASE_URL', null),
        ],
        'test' => [
            ...
        ],
    ],
   ```
4. Docker立ち上げ
   以下のコマンドを実行
   ```
   Docker compose up -d
   ```
5. Composerのインストール
   コンテナに入る
   ```
   docker exec -it php-apache-app bash
   ```
   以下のコマンドを実行
   ```
   composer i
   ```
6. マイグレーション実行
   コンテナに入っていない場合はコンテナに入り直す\
   入っている場合は以下のコマンドを実行
   ```
   bin/cake migrations migrate
   ```

### xdebugを使用する場合
xdebugの拡張機能をインストールする\
作成された.vscode/launch.jsonを以下の通りに修正
```
{
    "version": "0.2.0",
    "configurations": [

        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}"
            }
        },
    ]
}
```