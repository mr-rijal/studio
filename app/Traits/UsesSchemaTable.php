<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

trait UsesSchemaTable
{
    /**
     * Get the table associated with the model.
     * Override to use schema prefix when active company schema is set.
     *
     * @return string
     */
    public function getTable()
    {
        // Get the base table name (either from $table property or generate from class name)
        if (isset($this->table)) {
            $table = $this->table;
        } else {
            $table = str_replace('\\', '', Str::snake(Str::plural(class_basename($this))));
        }

        // Get the active schema from config
        $schema = Config::get('app.dbschema');

        // If schema is set, prepend it to the table name for PostgreSQL
        if ($schema) {
            // Escape schema and table names for PostgreSQL
            $quotedSchema = '"' . str_replace('"', '""', $schema) . '"';
            $quotedTable = '"' . str_replace('"', '""', $table) . '"';
            return "{$quotedSchema}.{$quotedTable}";
        }

        return $table;
    }
}
