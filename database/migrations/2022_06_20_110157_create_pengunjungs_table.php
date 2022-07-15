<?php

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_golongan')->unsigned();
            // $table->foreign('id_golongan')->references('id')->on('golongans');
            // menghubungkan dari golongans id ke id_golongan
            $table->integer('id_golongans')->unsigned();
            $table->string('pel_no', 20);
            $table->string('pel_nama', 50);
            $table->text('pel_alamat');
            $table->string('pel_no_hp', 25);
            $table->string('pel_ktp', 50);
            $table->string('pel_seri', 50);
            //int
            $table->integer('pel_aktif')->default(0);
            $table->integer('user_id')->unsigned();
            $table->enum('pel_status', ['Y', 'N'])->default('Y');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengunjungs');
    }
};
