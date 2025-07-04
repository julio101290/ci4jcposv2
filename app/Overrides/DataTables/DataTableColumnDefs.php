<?php

namespace Hermawan\DataTables;

class DataTableColumnDefs {

    private $number;
    private $columns = [];
    private $tableField = [];
    private $searchableColumns;
    public $returnAsObject = FALSE;

    public function __construct($builder) {
        $this->initFromBuilder($builder);
    }

    public function returnAsObject($returnAsObject) {
        $this->returnAsObject = $returnAsObject;
        return $this;
    }

    public function addNumbering($key) {
        $column = new Column();

        $column->key = $key;
        $column->alias = $key;
        $column->type = 'numbering';
        $column->searchable = FALSE;
        $column->orderable = FALSE;

        array_unshift($this->columns, $column);
    }

    public function add($key, $callback, $position) {
        $column = new Column();

        $column->key = $key;
        $column->alias = $key;
        $column->type = 'add';
        $column->searchable = FALSE;
        $column->orderable = FALSE;
        $column->callback = $callback;

        switch ($position) {

            case 'first':
                array_unshift($this->columns, $column);
                break;

            case 'last':
                $this->columns[] = $column;
                break;

            default:
                array_splice($this->columns, $position, 0, $column);
                break;
        }
    }

    public function edit($alias, $callback) {
        if ($alias) {
            $column = $this->getColumnBy('alias', $alias);
            if (is_object($column)) {
                $column->type = 'edit';
                $column->callback = $callback;
            }
        }
    }

    public function format($alias, $callback) {
        if ($alias) {
            $column = $this->getColumnBy('alias', $alias);
            if (is_object($column)) {
                $column->type = 'format';
                $column->callback = $callback;
            }
        }
    }

    public function remove($alias) {
        if (!is_array($alias))
            $aliases = [$alias];

        foreach ($this->columns as $index => $column) {
            if (in_array($column->alias, $aliases)) {
                unset($this->columns[$index]);
            }
        }

        $this->columns = array_values($this->columns);
    }

    public function setSearchable($searchable) {
        $this->searchableColumns = $searchable;
        return $this;
    }

    public function addSearchable($searchable) {
        if (is_array($searchable))
            $this->searchableColumns = array_merge($this->searchableColumns, $searchable);
        else
            $this->searchableColumns[] = $searchable;
    }

    public function getColumns() {
        return $this->columns;
    }

    public function getOrderables() {
        $orderableColumns = [];

        if ($this->returnAsObject) {
            foreach (Request::get('columns') as $columnRequest) {
                if ($columnRequest['name'])
                    $orderableColumns[] = $columnRequest['name'];

                elseif ($column = $this->getColumnBy('alias', $columnRequest['data']))
                    $orderableColumns[] = $column->alias;
                else
                    $orderableColumns[] = $columnRequest['data'];
            }
        } else {
            foreach ($this->columns as $column)
                $orderableColumns[] = $column->orderable ? $column->alias : NULL;
        }

        return $orderableColumns;
    }

    public function getSearchRequest($index, $request) {

        if ($this->returnAsObject) {
            if ($request['name'])
                return trim($request['name']);

            elseif ($column = $this->getColumnBy('alias', $request['data']))
                return $column->key;
            else
                return $request['data'];
        } else {
            return $this->columns[$index]->key;
        }
    }

public function getSearchable()
{
    $builder = \Config\Database::connect()->table('dummy'); // Usamos ->table() para evitar el error del constructor
    $isPostgres = $builder->db()->getPlatform() === 'Postgre';

    if ($this->searchableColumns !== NULL) {
        return $this->searchableColumns;
    } else {
        $searchableColumns = [];

        foreach (Request::get('columns') as $index => $request) {
            if ($request['searchable'] == 'true') {
                if ($this->returnAsObject) {
                    if ($request['name']) {
                        $key = trim($request['name']);
                    } elseif ($column = $this->getColumnBy('alias', $request['data'])) {
                        if ($column->searchable) {
                            $key = $column->key;
                        } else {
                            continue;
                        }
                    } else {
                        $key = $request['data'];
                    }
                } else {
                    $column = $this->columns[$index];
                    if (! $column->searchable) {
                        continue;
                    }
                    $key = $column->key;
                }

                // Agrega comillas dobles en PostgreSQL si no están
                if ($isPostgres && !str_starts_with($key, '"')) {
                    if (strpos($key, '.') !== false) {
                        [$tableAlias, $columnName] = explode('.', $key);
                        $key = "\"$tableAlias\".\"$columnName\"";
                    } else {
                        $key = "\"$key\"";
                    }
                }

                // CAST solo si es PostgreSQL y no lo tiene ya
                $searchableColumns[] = ($isPostgres && !str_contains($key, 'CAST('))
                    ? "CAST($key AS TEXT)"
                    : $key;
            }
        }

        return $searchableColumns;
    }
}

    public function getNumbering() {
        $this->number = $this->number === NULL ? Request::get('start') + 1 : $this->number + 1;
        return $this->number;
    }

    public function initFromBuilder($baseBuilder) {
        $builder = clone $baseBuilder;
        $QBSelect = Helper::getObjectPropertyValue($builder, 'QBSelect');

        if (!empty($QBSelect)) {
            $baseSQL = $builder->getCompiledSelect(false);
            $parser = new \PHPSQLParser\PHPSQLParser();
            $sqlParsed = $parser->parse($baseSQL);

            foreach ($sqlParsed['SELECT'] as $index => $selectParsed) {
                $column = new Column();

                // Maneja alias correctamente si existe
                if (!empty($selectParsed['alias']['no_quotes']['parts'])) {
                    $alias = end($selectParsed['alias']['no_quotes']['parts']);
                } else {
                    // Extrae el alias del campo si no hay alias explícito
                    $baseExpr = str_replace('"', '', $selectParsed['base_expr']);
                    $parts = explode('.', $baseExpr);
                    $alias = end($parts);
                }

                // Key limpio en formato tabla.columna
                $key = str_replace('"', '', $selectParsed['base_expr']);

                $column->key = $key;
                $column->alias = $alias;
                $this->columns[] = $column;
            }
        } else {
            $QBFrom = Helper::getObjectPropertyValue($builder, 'QBFrom');
            $QBJoin = Helper::getObjectPropertyValue($builder, 'QBJoin');

            foreach ($QBFrom as $table) {
                $fieldData = $builder->db()->getFieldData($table);
                foreach ($fieldData as $field) {
                    $column = new Column();
                    $column->key = $table . '.' . $field->name;
                    $column->alias = $field->name;
                    $this->columns[] = $column;
                }
            }

            foreach ($QBJoin as $table) {
                $fieldData = $builder->db()->getFieldData($table);
                foreach ($fieldData as $field) {
                    $column = new Column();
                    $column->key = $table . '.' . $field->name;
                    $column->alias = $field->name;
                    $this->columns[] = $column;
                }
            }
        }

        return $this;
    }

    public function getColumnBy($by, $value) {
        foreach ($this->columns as $column) {
            if ($column->$by == $value)
                return $column;
        }
        return NULL;
    }
}

// End of DataTableColumnDefs Class.