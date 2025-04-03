<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Cria o banco de dados antes das migrations';

    public function handle()
    {
        $databaseName = env('DB_DATABASE', 'kart_mania');

        Config::set('database.connections.mysql.database', null);
        DB::purge('mysql');

        $this->info("Criando banco de dados: $databaseName");

        DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

        $this->info("Banco de dados '$databaseName' criado com sucesso!");
    }
}
