<?php

/**
 * https://qiita.com/schrosis/items/8253b38db735f0d20cb7
 */

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand as Command;

class MakeRepositoryInterfaceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repositoryInterface';  // make:〇〇にする

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RepositoryInterface の作成';  // $descriptionプロパティを書き換える

    protected $type = 'RepositoryInterface';

    /**
     * 生成に使うスタブファイルを取得する
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/interface.stub';
    }

    /**
     * クラスのデフォルトの名前空間を取得する
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories\Interfaces';
    }
}
