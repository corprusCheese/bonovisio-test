<?php

namespace App\Http\Repositories;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterRepository extends Repository {

    const PAGINATE_CONST = 10;

    public function show(int $id, array $fields)
    {
        return $this->model->findOrFail($id, $fields);
    }

    public function showOnlyImages(int $id)
    {
        $result = $this->model->findOrFail($id, ['text']);
        if ($result) {
            $result['images'] = $result->getPhotoLinksFromText();
            unset($result['text']);
        }

        return $result;
    }

    public function find(?string $createdAtSort = null)
    {
        if ($createdAtSort === "asc") {
            $result = $this->model::orderBy("created_at");
        } else if ($createdAtSort === "desc") {
            $result = $this->model::orderByDesc("created_at");
        } else {
            $result = $this->model::where([]);
        }

        return $result->simplePaginate(self::PAGINATE_CONST, ['name', 'email']);
    }
}
