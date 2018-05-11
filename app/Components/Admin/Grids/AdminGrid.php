<?php

namespace App\Components\Admin\Grids;

use Closure;
use Leantony\Grid\Grid;

/**
 * Class AdminGrid
 * @package App\Components\Admin\Grids
 */
class AdminGrid extends Grid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Admins';

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
                    "operator" => "=",
                ],
            ],
            "email"  => [
                "label"  => "System Name",
                "search" => [
                    "enabled" => true,
                ],
                "filter" => [
                    "enabled"  => true,
                    "operator" => "like",
                ],
            ],
            "created_at"  => [
                "sort"   => false,
                "date"   => "true",
                "filter" => [
                    "enabled"  => true,
                    "type"     => "date",
                    "operator" => "<=",
                ],
            ],
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
        $this->sortRouteName = 'admin.admins';
        $this->searchRoute = 'admin.admins';

        // crud support
        $this->createRouteName = 'admin.admin.form';
        $this->indexRouteName = 'admin.admins';
        $this->viewRouteName = 'admin.admin.form';
        $this->deleteRouteName = 'admin.admin.delete';
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
        $this->clearButtons();
        $this->editRowButton('view', ['name' => '']);
        $this->editRowButton('delete', ['name' => '']);

        $this->makeCustomButton([
            'name' => '+',
            'url'  => route('admin.admin.form'),
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

    /**
     *
     */
    public static function getToolbarSize(){}
}