<?php

//Author: Simón Flórez Silva

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Course extends Model
{
    /*
        attributes id, title, learningStyles, lessons, categories, author,
        created_at, price, summary, image
    */
    protected $fillable = ['title', 'learningStyle', 'categories', 'author_id', 'price', 'summary', 'image'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;
    }

    public function getLearningStyle()
    {
        return $this->attributes['learningStyle'];
    }

    public function setLearningStyle($learningStyle)
    {
        $this->attributes['learningStyle'] = $learningStyle;
    }

    public function getCategories()
    {
        return $this->attributes['categories'];
    }

    public function setCategories($categories)
    {
        $this->attributes['categories'] = $categories;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getSummary()
    {
        return $this->attributes['summary'];
    }

    public function setSummary($summary)
    {
        $this->attributes['summary'] = $summary;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public static function validate(Request $request)
    {
        /*
            Regex for title validates alphanumeric with spaces
            Regex for categories validates comma, space and dash separated alphabetic
            Image is optional but if a file is input it needs to be an image
         */
        $rules = [
            'title' => ['required', 'regex:/(^[a-zA-Z0-9 ]+$)+/'],
            'learningStyle' => ['required', 'alpha', 'max:100'],
            'categories' => ['required', 'regex:/(^[a-zA-Z, -]+$)+/', 'max:100'],
            'price' => ['required', 'numeric', 'gte:0', 'lte:999999'],
            'summary' => ['required', 'max:1000'],
        ];
        $request->validate($rules);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
