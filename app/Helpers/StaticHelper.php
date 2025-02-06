<?php


/**
 * List of Genders.
 *
 * @return void
 */
if (!function_exists('genders')) {
    function genders()
    {
        return  $Genders = [
        ''=> 'Select one',
        'male'=> 'Male',
        'female'=> 'Female',
      ];
    }
}

/**
 * List of identity type.
 *
 * @return void
 */
if (!function_exists('translationTypes')) {
    function translationTypes()
    {
        return  [
            'action' => 'Action',
            'message' => 'Message',
            'column' => 'Column',
        ];
    }

}

/**
 * List of identity type.
 *
 * @return void
 */
if (!function_exists('status')) {
    function status()
    {
        return  [
            'action' => 'Action',
            'message' => 'Message',
            'column' => 'Column',
        ];
    }

}

/**
 * List of product types.
 *
 * @return void
 */
if (!function_exists('warehouseTypes')) {
    function warehouseTypes()
    {
        return  [
            'type 1' => 'type 1',
            'type 2' => 'type 2',
            'type 3' => 'type 3',
        ];
    }

}
/**
 * List of product types.
 *
 * @return void
 */
if (!function_exists('productTypes')) {
    function productTypes()
    {
        return  [
            'type 1' => 'type 1',
            'type 2' => 'type 2',
            'type 3' => 'type 3',
        ];
    }

}

/**
 * List of services.
 *
 * @return void
 */
if (!function_exists('services')) {
    function services()
    {
        return  [
            'service 1' => 'Service 1',
            'service 2' => 'Service 2',
            'service 3' => 'Service 3',
            
        ];
    }

}
/**
 * List of services.
 *
 * @return void
 */
if (!function_exists('buyUnits')) {
    function buyUnits()
    {
        return  [
            'KG' => 'KG',
            'L' => 'Liter',
            'Piece' => 'Piece',
        ];
    }

}