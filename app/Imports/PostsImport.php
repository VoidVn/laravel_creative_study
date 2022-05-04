<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            if (isset($item['taitl'])) {
                Post::firstOrCreate([
                    'title' => $item['taitl']
                ], [
                    'title' => $item['taitl'],
                    'post_content' => $item['kontent'],
                    'image' => $item['izobrazenie'],
                    'likes' => $item['laiki'],
                    'active' => $item['status'],
                    'category_id' => $item['kategoriya'],
                ]);
            }
        }
    }
}
