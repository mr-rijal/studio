<?php

namespace App\Database;

use Illuminate\Database\Query\Grammars\PostgresGrammar as BasePostgresGrammar;

class PostgresGrammar extends BasePostgresGrammar
{
    /**
     * Wrap a table in keyword identifiers.
     * Override to properly handle schema-qualified table names.
     *
     * @param  \Illuminate\Database\Query\Expression|string  $table
     * @param  string|null  $prefix
     * @return string
     */
    public function wrapTable($table, $prefix = null)
    {
        if ($this->isExpression($table)) {
            return $this->getValue($table);
        }

        // Check if the table name contains a dot (schema.table format)
        if (is_string($table) && strpos($table, '.') !== false) {
            // Split by dots to handle cases like "schema.schema.table" or "schema.table"
            $parts = explode('.', $table);

            if (count($parts) >= 2) {
                // Always use first part as schema and last part as table
                // This automatically handles duplicate schemas like "schema.schema.table"
                $schema = $parts[0];
                $tableName = $parts[count($parts) - 1];

                // Quote schema and table separately and return directly
                // Don't call parent to avoid double-processing or prefix issues
                return $this->wrapValue($schema).'.'.$this->wrapValue($tableName);
            }
        }

        // For tables without schema qualification, use parent's implementation
        // But check if prefix might cause issues with schema-qualified tables
        $prefix ??= $this->connection->getTablePrefix();

        // If prefix is set and table doesn't have a dot, let parent handle it
        // But if table already has schema from getTable(), parent might add prefix incorrectly
        return parent::wrapTable($table, $prefix);
    }
}
