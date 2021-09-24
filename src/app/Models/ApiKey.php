<?php

namespace Sofiakb\Lumen\ApiKey\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApiKey
 *
 * @property int $id
 * @property string $key
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiKey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApiKey extends Model
{
    protected static $unguarded = true;
    
    protected $casts = ['active' => 'boolean'];
    
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->setConnection(env('API_KEY_CONNECTION', config('database.default')));
    }
    
    public function activate()
    {
        return $this->update(['active' => true]);
    }
    
    public function deactivate()
    {
        return $this->update(['active' => false]);
    }
}
