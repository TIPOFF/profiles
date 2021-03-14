<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tipoff\Seo\Models\Webpage;
use Tipoff\Profiles\Models\Profile;

class CreateProfileLinksTable extends Migration
{
    public function up()
    {
        Schema::create('profile_links', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index();         // eg. Website, Facebook, Twitter, Instagram
            $table->foreignIdFor(Profile::class)->index();
            $table->foreignIdFor(Webpage::class);
            $table->unsignedTinyInteger('priority')->default(100);

            $table->foreignIdFor(app('user'), 'creator_id');
            $table->foreignIdFor(app('user'), 'updater_id');
            $table->timestamps();

            $table->unique(['type', 'profile_id']);
        });
    }
}

