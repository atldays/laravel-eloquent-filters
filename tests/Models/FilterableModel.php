<?php

namespace Atldays\EloquentFilters\Tests\Models;

use Atldays\EloquentFilters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterableModel extends Model
{
    use Filterable;
    use HasFactory;

    /** @var list<string> */
    protected $guarded = [];
}
