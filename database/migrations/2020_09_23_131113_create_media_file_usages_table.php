<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFileUsagesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('media_file_usages', function (Blueprint $table) {
      $table->foreignId('media_file_id')->constrained('media_files');
      $table->string('usage_table');
      $table->string('usage_id');

      $table->primary(['media_file_id', 'usage_table', 'usage_id']);

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('media_file_usages');
  }
}
