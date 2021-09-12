<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $base_url
 * @property string $created_at
 * @property string $updated_at
 * @property Subscriber[] $subscribers
 */
class Website extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'website';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['base_url', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }
}
