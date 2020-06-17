<?php

namespace FjordApp\Controllers\Crud;

use Illuminate\Database\Eloquent\Builder;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class GroupController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Group::class;

    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @param integer $id
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation, $id = null): bool
    {
        return $user->can("{$operation} groups");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }
}
