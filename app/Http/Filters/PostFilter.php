<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const POST_CONTENT = 'post_content';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::POST_CONTENT => [$this, 'content'],
            self::CATEGORY_ID => [$this, 'categoryId']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where(self::TITLE, 'like', "%$value%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where(self::POST_CONTENT, 'like', "%$value%");
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->where(self::CATEGORY_ID, $value);
    }
}