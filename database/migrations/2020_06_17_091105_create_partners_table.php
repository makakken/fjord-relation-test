<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Fjord\Support\Migration\MigratePermissions;

class CreatePartnersTable extends Migration
{
    use MigratePermissions;

    /**
     * Permissions that should be created for this crud.
     *
     * @var array
     */
    protected $permissions = [
        'create partners',
        'read partners',
        'update partners',
        'delete partners',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('text');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        $this->upPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('partners');

        $this->downPermissions();
    }
}
