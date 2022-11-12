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

