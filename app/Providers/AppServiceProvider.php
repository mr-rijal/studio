<?php

namespace App\Providers;

use App\Database\PostgresGrammar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use custom PostgreSQL grammar to handle schema-qualified table names
        // Apply to all PostgreSQL connections
        $defaultConnection = config('database.default');
        $connection = DB::connection($defaultConnection);

        if ($connection->getDriverName() === 'pgsql') {
            $connection->setQueryGrammar(new PostgresGrammar($connection));
        }

        // Also apply to pgsql connection if it exists
        if (config('database.connections.pgsql')) {
            $pgsqlConnection = DB::connection('pgsql');
            $pgsqlConnection->setQueryGrammar(new PostgresGrammar($pgsqlConnection));
        }
    }
}
