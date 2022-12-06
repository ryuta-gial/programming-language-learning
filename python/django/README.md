＃SWChallenge

## 実行手順

- 仮想環境に入り、パッケージのインストール

  ```
  $ pipenv shell　
  $ pipenv install --dev
  ```

- マイグレーションファイルの内容をSQLに翻訳しデータベースに適用する。(マイグレーション実行)

  ```
  $ cd quiz_project
  $ python3 manage.py migrate
  ```

  

- 開発用サーバー起動

  ```
  $ cd quiz_project
  $ python3 manage.py runserver
  
  http://127.0.0.1:8000/で表示確認
  ```

  

- DBと管理者画面の確認

  ```
  //PostgreSQLイメージをビルド
  $ cd quiz_project
  $ docker-compose up --build
  
  //データベースを構築
  $ python3 manage.py makemigrations
  $ python3 manage.py migrate
  
  //開発用のユーザーを作成
  $ pipenv shell
  $ sh setup.sh
  
  //管理者画面を確認(admin,admin)
  $ python3 manage.py runserver
  http://127.0.0.1:8000/admin

  ```
