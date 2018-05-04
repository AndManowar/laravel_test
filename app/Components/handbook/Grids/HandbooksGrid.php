<?php

namespace App\Components\handbook\Grids;

use Closure;
use Leantony\Grid\Grid;

/**
 * Class HandbooksGrid
 * @package App\Components\handbook\Grids
 */
class HandbooksGrid extends Grid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Handbooks';

    /**
     * Specify if the rows on the table should be clicked to navigate to the record
     *
     * @var bool
     */
    protected $linkableRows = false;

    /**
     * Set the columns to be displayed
     *
     * @return void
     * @throws \Exception if an error occurs during parsing of the data
     */
    public function setColumns()
    {
        $this->columns = [
            "id"          => [
                "label"  => "ID",
                "filter" => [
                    "enabled"  => true,
                    "operator" => "="
                ],
                "styles" => [
                    "column" => "col-md-2"
                ]
            ],
            "systemName"  => [
                "search" => [
                    "enabled" => true
                ],
                "filter" => [
                    "enabled"  => true,
                    "operator" => "like"
                ]
            ],
            "description" => [
                "search" => [
                    "enabled" => true
                ],
                "filter" => [
                    "enabled"  => true,
                    "operator" => "like"
                ]
            ],
            "relation"    => [
                "search" => [
                    "enabled" => true
                ],
                "filter" => [
                    "enabled"  => true,
                    "operator" => "="
                ]
            ],
            "created_at"  => [
                "sort"   => false,
                "date"   => "true",
                "filter" => [
                    "enabled"  => true,
                    "type"     => "date",
                    "operator" => "<="
                ]
            ]
        ];
    }

    /**
     * Set the links/routes. This are referenced using named routes, for the sake of simplicity
     *
     * @return void
     */
    public function setRoutes()
    {
        // searching, sorting and filtering
        $this->sortRouteName = 'admin.handbook';
        $this->searchRoute = 'admin.handbook';

        // crud support
        $this->indexRouteName = 'admin.handbook';
        $this->viewRouteName = 'admin.handbook.show-data';
        $this->deleteRouteName = 'admin.handbook.delete';
    }

    /**
     * Return a closure that is executed per row, to render a link that will be clicked on to execute an action
     *
     * @return Closure
     */
    public function getLinkableCallback(): Closure
    {
        $view = $this->viewRouteName;

        return function ($gridName, $item) use ($view) {
            return route($view, [$gridName => $item->id]);
        };
    }

    /**
     * Configure rendered buttons, or add your own
     *
     * @return void
     * @throws \Exception
     */
    public function configureButtons()
    {
        $this->buttonsToGenerate = ['view', 'delete'];
        $this->makeCustomButton([
            'name' => '+',
            'url'  => url('/admin/handbook/form')
        ], 'toolbar');
        $this->makeCustomButton([
            'name' => 'refresh cache',
            'url'  => url('/admin/handbook/refresh-cache')
        ], 'toolbar');

    }

    /**
     * Returns a closure that will be executed to apply a class for each row on the grid
     * The closure takes two arguments - `name` of grid, and `item` being iterated upon
     *
     * @return Closure
     */
    public function getRowCssStyle(): Closure
    {
        return function () {
            return "";
        };
    }
}