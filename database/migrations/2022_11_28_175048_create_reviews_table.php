<?php

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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_game');
            $table->integer('score');
            $table->longText('message');
            $table->integer('list_type');
            $table->timestamps();
        });

        DB::unprepared('
CREATE TRIGGER scoreTriggerUpdate AFTER UPDATE ON reviews
FOR EACH ROW BEGIN
DECLARE SUM_SCORE FLOAT;
DECLARE ALL_SCORES INT;
DECLARE FINAL_SCORE FLOAT;
SET @SUM_SCORE = (SELECT SUM(score) FROM reviews WHERE (id_game = NEW.id_game));
SET @ALL_SCORES = (SELECT COUNT(score) FROM reviews WHERE (id_game = NEW.id_game));
SET @FINAL_SCORE = @SUM_SCORE/@ALL_SCORES;
UPDATE games SET score = @FINAL_SCORE WHERE id = NEW.id_game;
END
');
DB::unprepared('
CREATE TRIGGER scoreTriggerInsert AFTER INSERT ON reviews
FOR EACH ROW BEGIN
DECLARE SUM_SCORE FLOAT;
DECLARE ALL_SCORES INT;
DECLARE FINAL_SCORE FLOAT;
SET @SUM_SCORE = (SELECT SUM(score) FROM reviews WHERE (id_game = NEW.id_game));
SET @ALL_SCORES = (SELECT COUNT(score) FROM reviews WHERE (id_game = NEW.id_game));
SET @FINAL_SCORE = @SUM_SCORE/@ALL_SCORES;
UPDATE games SET score = @FINAL_SCORE WHERE id = NEW.id_game;
END
');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
