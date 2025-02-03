<?php

use App\Models\City;
use App\Models\State;
use App\Models\Groupe;
use App\Models\Country;
use App\Models\Language;
use App\Models\Profession;
use Modules\Bank\App\Models\Bank;
use Modules\Site\App\Models\Site;
use Spatie\Permission\Models\Role;
use Modules\Carnet\App\Models\Carnet;
use Modules\Compte\App\Models\Compte;
use Modules\Secteur\App\Models\Secteur;
use Modules\Sidebar\App\Models\Sidebar;
use Modules\Society\App\Models\Society;
use Modules\Permission\App\Models\Permission;

/**
 * List of users.
 *
 * @return void
 */
if (!function_exists('users')) {
    function users()
    {

    }
}

/**
 * List of Roles.
 *
 * @return void
 */
if (!function_exists('roles')) {
    function roles()
    {
      return $roles = Role::pluck('name','id');
    }
}

/**
 * List of Countries.
 *
 * @return void
 */
if (!function_exists('countries')) {
    function countries()
    {
      return Country::pluck('name','id');
    }
}

if (!function_exists('states')) {
    function states()
    {
      return State::pluck('name','id');
    }
}




if (!function_exists('cities')) {
    function cities()
    {
      return City::pluck('name','id');
    }
}

if (!function_exists('secteurs')) {
    function secteurs()
    {
      return Secteur::pluck('name','id');
    }
}

/**
 * List of languages.
 *
 * @return void
 */
if (!function_exists('dynamicLang')) {
    function dynamicLang()
    {
      return $languages = Language::pluck('name','id');
    }
}


/**
 * List of Goupes.
 *
 * @return void
 */
if (!function_exists('groupes')) {
    function groupes()
    {
      return $groupes = Groupe::pluck('name','name');
    }
}

/**
 * List of Goupes user in permission.
 *
 * @return void
 */
if (!function_exists('permisionGroupes')) {
    function permisionGroupes()
    {
      return  Groupe::pluck('name','id');
    }
}


/**
 * List of sidebnars.
 *
 * @return void
 */
if (!function_exists('sidebars')) {
    function sidebars()
    {
      return Sidebar::pluck('name','id');
    }
}


/**
 * List of sidebnars.
 *
 * @return void
 */
if (!function_exists('permissions')) {
    function permissions()
    {
      return Permission::pluck('name','name');
    }
}


/**
 * List of fonctions.
 *
 * @return void
 */
if (!function_exists('fonctions')) {
    function fonctions()
    {
      return Profession::pluck('name','name');
    }
}

/**
 * List of sites.
 *
 * @return void
 */
if (!function_exists('sites')) {
    function sites()
    {
      return Site::pluck('name','id');
    }
}

/**
 * List of banks.
 *
 * @return void
 */
if (!function_exists('banks')) {
    function banks()
    {
      return Bank::pluck('name','id');
    }
}

/**
 * List of comptes.
 *
 * @return void
 */
if (!function_exists('comptes')) {
    function comptes()
    {
      return Compte::pluck('agence','id');
    }
}

/**
 * List of societies.
 *
 * @return void
 */
if (!function_exists('societies')) {
    function societies()
    {
      return Society::pluck('name','id');
    }
}

/**
 * List of carnets.
 *
 * @return void
 */
if (!function_exists('carnets')) {
    function carnets()
    {
      return Carnet::pluck('series','id');
    }
}
