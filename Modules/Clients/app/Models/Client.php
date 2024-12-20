<?php

namespace Modules\Clients\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\ItemManager\Models\ItemMaster;
use Modules\Projects\Models\Project;

// use Modules\Clients\Database\Factories\ClientFactory;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'name',
        'city'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class,'client_id','id');
    }

    // protected static function newFactory(): ClientFactory
    // {
    //     // return ClientFactory::new();
    // }
}