<?php

namespace Jclavo\Profiles\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jclavo\Profiles\Database\Factories\ProfileFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'activated', 'fixed'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new ProfileFactory;
    }

    /**
     * Custom function section
     */

    /**
     * changeActivatedStatus
     */
    public function changeActivatedStatus(bool $status): void
    {
        $this->activated = $status;
        $this->save();
    }

}