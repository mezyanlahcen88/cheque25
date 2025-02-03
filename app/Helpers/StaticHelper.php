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
