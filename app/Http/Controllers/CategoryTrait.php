<?php

declare (strict_types=1);

namespace App\Http\Controllers;

trait CategoryTrait
{
    private function generateNews(): array
    {
        $news = [];
        for ($i = 1; $i <= 4; $i++) {
            $news[$i] = [
                'id' => $i,
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'author' => \fake()->userName(),
                'created_at' => \now()->format('d-m-Y H:i'),
            ];
        }
        return $news;
    }

    private function generateCategory(int $quantityCategory): array
    {
        $categories = [];
        for($i=1; $i<=$quantityCategory; $i++) {
                $categories[$i] = [
                    'id' => $i,
                    'title' => \fake()->text(5),
                    'newslist' => $this->generateNews(),
                ];
        }
        return $categories;
    }


    public function getCategory(int $categoryId = null): array
    {
        $quantityCategory = 5;

        if ($categoryId === null) {
            return $this->generateCategory($quantityCategory);
        }

        return $this->generateCategory(1);
    }
}
