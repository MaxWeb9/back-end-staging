<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $guarded = [];

    const STATUS_CLOSE = 0;

    protected function is_close() {
        return $this->status = self::STATUS_CLOSE;
    }

    protected function close() {
        $this->status = 0;
        return $this;
    }
}
