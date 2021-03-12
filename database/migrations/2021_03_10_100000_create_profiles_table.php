<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tipoff\Profiles\Models\ProfileLink;

class CreateProfileTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->morphs('profileable');      //  User, Location, Company
            $table->string('type');         // eg. Website, Facebook, Twitter, Instagram
            $table->string('bio');
            $table->unsignedTinyInteger('priority')->default(100);

            $table->foreignIdFor(ProfileLink::class);
            $table->foreignIdFor(app('user'), 'creator_id');
            $table->foreignIdFor(app('user'), 'updater_id');
            $table->timestamps();

            $table->unique(['profileable_id','profileable_type','type',]);
        });
    }
}

