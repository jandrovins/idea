<?php

//Edited by: Simón Flórez Silva

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /* Attributes id, name, email, dateOfBirth, phoneNumber,
        learningStyle, userKind, email_verified_at, password,
        created_at, updated_at, remember_token
    */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dateOfBirth',
        'phoneNumber',
        'learningStyle',
        'image',
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

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getDateOfBirth()
    {
        return $this->attributes['dateOfBirth'];
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->attributes['dateOfBirth'] = $dateOfBirth;
    }

    public function getPhoneNumber()
    {
        return $this->attributes['phoneNumber'];
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->attributes['phoneNumber'] = $phoneNumber;
    }

    public function getUserKind()
    {
        return $this->attributes['userKind'];
    }

    public function setUserKind($userKind)
    {
        $this->attributes['userKind'] = $userKind;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        return $this->attributes['image'] = $image;
    }

    public function getLearningStyle()
    {
        return $this->attributes['learningStyle'];
    }

    public function setLearningStyle($learningStyle)
    {
        $this->attributes['learningStyle'] = $learningStyle;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
