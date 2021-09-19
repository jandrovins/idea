<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Course extends Model
{
    /*
        attributes id, title, learningStyles, lesson (non-primitive TODO()), categories, author (non-primitive TODO()),
        created_at, price, summary, introImage (non-primitive TODO())
    */
    protected $fillable = ['title', 'learningStyles', 'categories', 'price', 'summary','lesson_id'];

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

    public function getLearningStyles()
    {
        return $this->attributes['learningStyles'];
    }

    public function setLearningStyles($learningStyles)
    {
        $this->attributes['learningStyles'] = $learningStyles;
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

    public static function validate(Request $request)
    {
        /*
            Regex for title validates alphanumeric with spaces
            Regex for learningStyles validates comma and space separated alphabetic
            Regex for categories validates comma, space and dash separated alphabetic
         */
        $request->validate([
            'title' => ['required', 'regex:/(^[a-zA-Z0-9 ]+$)+/'],
            'learningStyles' => ['required', 'regex:/(^[a-zA-Z, ]+$)+/'],
            'categories' => ['required', 'regex:/(^[a-zA-Z, -]+$)+/'],
            'price' => ['required', 'numeric', 'gte:0'],
            'summary' => ['required'],
        ]);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
