<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;

use App\Models\Group;
use FjordApp\Controllers\Crud\GroupController;

class GroupConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Group::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = GroupController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.groups')),
            'plural' => ucfirst(__f('models.groups')),
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return (new $this->model)->getTable();
    }

    /**
     * Build index table.
     *
     * @param Fjord\Crud\CrudIndex $container
     * @return void
     */
    public function index(CrudIndex $container)
    {
        // Expand html container to full width.
        $container->expand(false);

        $container->table(function ($table) {
            $table->col('title')
                ->value('{title}')
                ->sortBy('title');
        })
            ->sortByDefault('id.desc')
            ->search('title')
            ->sortBy([
                'id.desc' => __f('fj.sort_new_to_old'),
                'id.asc' => __f('fj.sort_old_to_new'),
            ])
            ->width(12);
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $container
     * @return void
     */
    public function show(CrudShow $container)
    {
        $container->card(function($form) {

            $form->input('title')
                ->title('Title')
                ->width(12);

            $form->relation('partners')
                ->title('Partners')
                ->preview(function ($table) {
                    $table->col('title');
                });

            $form->textarea('text')
                ->title('Dscription')
                ->width(12);

        });
    }
}
