<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class SchemaHelper
{
    /**
     * Create a new PostgreSQL schema.
     */
    public static function createSchema(string $schema): void
    {
        // Escape schema name for PostgreSQL (use double quotes for identifiers)
        $quotedSchema = '"' . str_replace('"', '""', $schema) . '"';

        try {
            DB::statement("CREATE SCHEMA IF NOT EXISTS {$quotedSchema}");
        } catch (\Exception $e) {
            throw new \Exception("Failed to create schema: {$schema}. Error: {$e->getMessage()}");
        }
    }

    /**
     * Run migrations for the specified schema.
     * Migrates tables from ./database/migrations to the new schema.
     */
    public static function migrateTable(string $schema): void
    {
        // Set the search_path to the schema for PostgreSQL
        $quotedSchema = '"' . str_replace('"', '""', $schema) . '"';

        try {
            // Set search_path to the schema
            DB::statement("SET search_path TO {$quotedSchema}");

            // Get the tenant migrations path
            $tenantMigrationsPath = database_path('migrations');

            // Temporarily update the database config to use the schema
            $originalSearchPath = Config::get('database.connections.pgsql.search_path', 'public');
            Config::set('database.connections.pgsql.search_path', $schema);

            // Clear the connection to apply new config
            DB::purge('pgsql');

            // Check if tenant migrations directory exists
            if (is_dir($tenantMigrationsPath)) {
                // Run migrations from tenant directory
                // The --path option expects a path relative to database/migrations
                Artisan::call('migrate', [
                    '--path' => 'database/migrations',
                    '--force' => true,
                ]);
            } else {
                // If tenant migrations don't exist, run all migrations
                Artisan::call('migrate', [
                    '--force' => true,
                ]);
            }

            // Restore original search_path
            Config::set('database.connections.pgsql.search_path', $originalSearchPath);
            DB::purge('pgsql');

            // Reset search_path to default (public)
            DB::statement("SET search_path TO public");
        } catch (\Exception $e) {
            // Reset search_path to default on error
            DB::statement("SET search_path TO public");
            throw new \Exception("Failed to migrate tables for schema: {$schema}. Error: {$e->getMessage()}");
        }
    }

    /**
     * Run seeders for the specified schema.
     */
    public static function seedTable(string $schema): void
    {
        // Set the search_path to the schema for PostgreSQL
        $quotedSchema = '"' . str_replace('"', '""', $schema) . '"';

        try {
            // Set search_path to the schema
            DB::statement("SET search_path TO {$quotedSchema}");

            // Temporarily update the database config to use the schema
            $originalSearchPath = Config::get('database.connections.pgsql.search_path', 'public');
            Config::set('database.connections.pgsql.search_path', $schema);

            // Clear the connection to apply new config
            DB::purge('pgsql');

            // Run seeders
            Artisan::call('db:seed', [
                '--force' => true,
            ]);

            // Restore original search_path
            Config::set('database.connections.pgsql.search_path', $originalSearchPath);
            DB::purge('pgsql');

            // Reset search_path to default (public)
            DB::statement("SET search_path TO public");
        } catch (\Exception $e) {
            // Reset search_path to default on error
            DB::statement("SET search_path TO public");
            throw new \Exception("Failed to seed tables for schema: {$schema}. Error: {$e->getMessage()}");
        }
    }

    /**
     * Set the active company schema in the database configuration.
     * This will use the schema as a prefix for table names.
     */
    public static function makeActiveCompany(string $schema): void
    {
        // Store the schema in the app config
        Config::set('app.dbschema', $schema);

        // Clear the connection to apply new config
        DB::purge('pgsql');
    }
}
