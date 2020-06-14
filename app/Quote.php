<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model {

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'tquotes';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

}
