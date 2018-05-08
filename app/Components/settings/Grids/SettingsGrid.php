<?php

namespace App\Components\settings\Grids;

use Closure;
use Leantony\Grid\Grid;

class SettingsGrid extends Grid
{
    /**
     * The name of the grid
     *
     * @var string
     */
    protected $name = 'Settings';

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
		    "id" => [
		        "label" => "ID",
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ],
		        "styles" => [
		            "column" => "col-md-2"
		        ]
		    ],
		    "description" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "systemName" => [
                "label" => "System Name",
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "fieldType" => [
                "label" => "Field Type",
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "value" => [
		        "search" => [
		            "enabled" => true
		        ],
		        "filter" => [
		            "enabled" => true,
		            "operator" => "="
		        ]
		    ],
		    "created_at" => [
		        "sort" => false,
		        "date" => "true",
		        "filter" => [
		            "enabled" => true,
		            "type" => "date",
		            "operator" => "<="
		        ]
		    ],
		    "updated_at" => [
		        "sort" => false,
		        "date" => "true",
		        "filter" => [
		            "enabled" => true,
		            "type" => "date",
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
        $this->sortRouteName = 'admin.settings';
        $this->searchRoute = 'admin.settings';

        // crud support
        $this->indexRouteName = 'admin.settings';
        $this->createRouteName = 'admin.setting.create';
        $this->viewRouteName = 'admin.setting.form';
        $this->deleteRouteName = 'admin.setting.delete';
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
            'url'  => route('admin.setting.form'),
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