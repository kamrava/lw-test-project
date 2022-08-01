<?php

namespace App\Entity;

use App\Services\Excel\Import\ImportServers;
use App\Transformer\ServerFilterTransformer;
use App\Transformer\UseTransformer;

class ServerModel
{
    private $withHeader = false;
    private $unique = false;
    private $flatten = false;
    private $from = 1;
    private $take = null;
    private $cols = ['A', 'B'];

    /**
     * Get Rows From Excel File
     * @param int $from
     * @return array
     */
    public function get(): array
    {
        return ImportServers::getRows($this->from, $this->take, $this->cols, $this->flatten, $this->unique);
    }

    /**
     * Start row
     * @param int $from
     * @return ServerModel
     */
    public function fromRow(int $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Set header
     * @return ServerModel
     */
    public function withHeader()
    {
        $this->withHeader = true;
        $this->from -= 1;
        return $this;
    }

    /**
     * Return only unique data
     * @return ServerModel
     */
    public function unique()
    {
        $this->unique = true;
        return $this;
    }

    /**
     * Flatten array
     * @return ServerModel
     */
    public function flatten()
    {
        $this->flatten = true;
        return $this;
    }

    /**
     * Only takes this much of rows(limit)
     * @param int|null $take
     * @return ServerModel
     */
    public function take($take)
    {
        $this->take = $take;
        return $this;
    }

    /**
     * Set Columns to Walk
     * @param string $from
     * @param string $to
     * @return ServerModel
     */
    public function setColumns(string $from, string $to)
    {
        $this->cols = [$from, $to];
        return $this;
    }

    /**
     * Get All Locations
     * @return array
     */
    public function getLocations()
    {
        $this->setColumns('D', 'D');

        $header = $this->withHeader ? 1 : 2;
        $from = 1 + $header;

        return $this
            ->fromRow($from)
            ->take(null)
            ->unique()
            ->flatten()
            ->get();
    }

    /**
     * Paginate Data
     * @return array
     */
    public function paginate($per_page = 10, $page = 1)
    {
        $this->setColumns('A', 'E');

        $header = $this->withHeader ? 1 : 2;
        $from = $per_page * ($page - 1) + $header;

        return $this
            ->fromRow($from)
            ->take($per_page)
            ->get();
    }

    /**
     * Paginate Data
     * @return array
     */
    public function getFilters()
    {
        $this->setColumns('G', 'I');

        $header = $this->withHeader ? 1 : 2;
        $from = 1 + $header;

        $filters = $this
            ->fromRow($from)
            ->take(3)
            ->get();

        $locations = $this->getLocations();

        $resource = UseTransformer::apply($filters, new ServerFilterTransformer($locations));
        return $resource->toArray();
    }
}
