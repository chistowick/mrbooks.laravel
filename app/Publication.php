<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model {

    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'tpublications';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;

}
