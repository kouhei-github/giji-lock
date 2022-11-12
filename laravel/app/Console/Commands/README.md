# Laravel で使用する DDD 用コード生成コマンド Template

Laravel project の app/Console は以下で実行
Service, Repository, UseCase, Interface の作成等を自動で行うコマンドを作成する

# Laravel プロジェクト(artisan がある場所)でシェルを実行

artisan ディレクトリがある場所(.env を置く場所)に **make-stub-file.sh** を下記内容で作成する

```bash
#!/bin/bash

#現在のディレクトリを変数に格納
CURRENT=$(pwd)

# ディレクトリの移動
cd app

# ディレクトリの作成
mkdir -p Services/Interfaces
mkdir -p UseCases/Interfaces
mkdir -p Repositories/Interfaces

# Consoleへ移動
cd Console

# ディレクトリ自動作成用プログラムをclone
git clone https://github.com/kouhei-github/Make-DDD-For-Laravel-Stubs.git Commands
cd Commands
rm -rf .git

cd $CURRENT


```

artisan や app があるディレクトリで下記を実行

```bash
# ディレクトリの作成等を自動でやってくれる
$ sh make-stub-file.sh
```

# artisan コマンドの使い方

下記コマンドで

```bash
# serviceの作成
$ php artisan make:service SampleService
# serviceインターフェースの作成
$ php artisan make:serviceInterface SampleServiceInterface

# repositoryの作成
$ php artisan make:repository SampleRepository
# repositoryインターフェースの作成
$ php artisan make:repositoryInterface SampleRepositoryInterface

# usecaseの作成
$ php artisan make:usecase SampleUseCase
# usecaseインターフェースの作成
$ php artisan make:useCaseInterface SampleUseCaseInterface
```

# Note

注意点などがあれば書く

# Author

作成情報を列挙する

- 永松
- 極秘
- kouheidesu03@gmail.com

# License

ライセンスを明示する

"This" is under [MIT license](https:/).
