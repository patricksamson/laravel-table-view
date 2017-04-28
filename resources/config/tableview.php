<?php
/*
|--------------------------------------------------------------------------
| Table View Config
|--------------------------------------------------------------------------
|
|
*/
return [
    'default-table-view' => 'tableview::tableview',

    /*
     * The table's default attributes.
     *
     * Possible value can be found here : http://element.eleme.io/#/en-US/component/table#table-attributes
     */
    'default-table-attributes' => [
        'border' => true,
        //'height' => 500,      // Static table size in pixels. No more, no less.
        'max-height' => 500,    // The table will start small and grow up to this value in pixels.
        'stripe' => true,
    ],

    /*
     * The column's default attributes.
     *
     * Possible value can be found here : http://element.eleme.io/#/en-US/component/table#table-column-attributes
     */
    'default-column-attributes' => [
    ],
];
