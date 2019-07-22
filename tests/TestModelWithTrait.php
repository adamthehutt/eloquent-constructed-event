<?php
declare(strict_types=1);

namespace AdamTheHutt\EloquentConstructedEvent\Tests;

use AdamTheHutt\EloquentConstructedEvent\HasConstructedEvent;
use Illuminate\Database\Eloquent\Model;

class TestModelWithTrait extends Model
{
    use HasConstructedEvent;
}
