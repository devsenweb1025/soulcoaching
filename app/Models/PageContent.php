<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $table = 'page_contents';

    protected $fillable = [
        'page',
        'section',
        'content'
    ];

    /**
     * Get content by page and section
     *
     * @param string $page
     * @param string $section
     * @return string|null
     */
    public static function getContent(string $page, string $section): ?string
    {
        $content = self::where('page', $page)
            ->where('section', $section)
            ->first();

        return $content ? $content->content : null;
    }
}
