<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class TodoOldmodel
{
    public $title;
    public $excerpt;
    public $slug;
    public $body;

    /**
     * @param $title
     * @param $excerpt
     * @param $slug
     */
    public function __construct($title, $excerpt, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->body= $body;
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $todo = static::find($slug);
        if (! $todo) {
            throw new ModelNotFoundException();
        }

        return $todo;
    }

    public static function all()
    {
//        return cache()->rememberForever('todos.all', function () {
        return collect(File::files(resource_path('todos')))
            ->map(fn($file)=>YamlFrontMatter::parseFile($file))
            ->map(fn($doc)=> new TodoOldmodel(
                $doc->title,
                $doc->excerpt,
                $doc->slug,
                $doc->body(),
            ))
            ->sortByDesc('date');
//        });
    }

}
