<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Enums\UserRole;
use App\Enums\UserType;
use App\Models\Traits\HasPayments;
//use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Traits\WithTemporaryMedia;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements HasMedia
{
    use HasPayments, HasFactory, Notifiable, HasRoles, InteractsWithMedia, WithTemporaryMedia, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'unit_number',
        'city',
        'zip_code',
        'contact_number',
        'pin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type()
    {
        return explode('-', $this->pin)[0];
    }

    public function is_tenant()
    {
        return $this->hasRole(UserRole::TENANT);
    }

    public function is_property_owner()
    {
        return $this->hasRole(UserRole::PROPERTY_OWNER);
    }

    public function is_admin()
    {
        return $this->hasRole(UserRole::ADMIN);
    }

    public function is_super_admin()
    {
        return $this->hasRole(UserRole::SUPER_ADMIN);
    }

    public function scopeSearch($query, $key)
    {
        $key_like = '%' . $key . '%';
        return $query->where(function ($q) use ($key_like) {
            $q->where('name', 'like', $key_like)
                ->orWhere('pin', 'like', $key_like);
        });
    }

    public function scopeTenants($query)
    {
        $key = UserType::TENANT . '-';
        $key_like = $key . '%';
        return $query->where('pin', 'like', $key_like);
    }

    public function scopePropertyOwners($query)
    {
        $key = UserType::PROPERTY_OWNER . '-';
        $key_like = $key . '%';
        return $query->where('pin', 'like', $key_like);
    }

    public function scopeRegular($query)
    {
        $key = UserType::REGULAR . '-';
        $key_like = $key . '%';
        return $query->where('pin', 'like', $key_like);
    }

    public function scopeAdmins($query)
    {
        $key = UserType::ADMIN . '-';
        $key_like = $key . '%';
        return $query->where('pin', 'like', $key_like);
    }

    public function scopeSuperAdmins($query)
    {
        $key = UserType::SUPER_ADMIN . '-';
        $key_like = $key . '%';
        return $query->where('pin', 'like', $key_like);
    }

    public function repair_requests()
    {
        return $this->hasMany('App\Models\RepairRequest');
    }

    public function assignRoleAndPin($role, $generatePin = true)
    {
        $roleKey = UserRole::fromValue($role)->key;
        $type = UserType::fromKey($roleKey)->value;

        $this->assignRole($role);

        if($generatePin) {
            $id = str_pad($this->id, 2, '0', STR_PAD_LEFT);
            $random = rand (1000 , 9999);

            $words = explode(' ', $this->name);
            $acronym = '';

            foreach ($words as $w) {
                $acronym .= $w[0];
            }

            $pin =  "{$type}-".strtoupper($acronym)."-{$id}{$random}";

            $this->update([
                'pin' => $pin
            ]);
        }

        return $this;
    }

    // user has a property owner classification/role
    public function properties()
    {
        return $this->hasMany('App\Models\Property', 'owner_id');
    }

    // user has a tenant classification/role
    public function residents()
    {
        return $this->belongsToMany('App\Models\Property');
    }

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->crop(\Spatie\Image\Manipulations::CROP_CENTER, 150, 150)
            ->sharpen(10);
    }

    public function getFullAddressAttribute()
    {
        if($this->unit_number || $this->unit_number !== 'N/A') {
            return "{$this->unit_number} {$this->address} {$this->city} {$this->zip_code}";
        } else {
            return "{$this->address} {$this->city} {$this->zip_code}";
        }
    }

    public function getTypeNameAttribute() {
        $role = '';
        switch($this->type()) {
            case UserType::SUPER_ADMIN:
            $role = 'Super Administrator';
            break;

            case UserType::ADMIN:
            $role = 'Administrator';
            break;

            case UserType::PROPERTY_OWNER:
            $role ='Property Owner';
            break;
            
            case UserType::TENANT:
            $role ='Tenant';
            break;

            case UserType::REGULAR:
            $role ='Regular';
            break;
        }
        return $role;
    }   
}
