<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $website_id
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property Website $website
 * @property PostSubscription[] $postSubscriptions
 */
class Subscriber extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'subscriber';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['website_id', 'email', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function website()
    {
        return $this->belongsTo('App\Website');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postSubscriptions()
    {
        return $this->hasMany('App\PostSubscription');
    }
}
