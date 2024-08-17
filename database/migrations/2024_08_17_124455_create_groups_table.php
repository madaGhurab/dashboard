<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('groupName');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //onDelete('cascade') when user is deleted it is deleted from groups table also
            $table->timestamps(); //Adds created_at and updated_at 
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
