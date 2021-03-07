<?php

namespace App\Http\Repositories;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterRepository extends Repository {

    const PAGINATE_CONST = 10;

    public function show(int $id, array $fields, ?bool $images = false) {

        $result = $this->model->findOrFail($id, $fields);

        if ($images && $result) {
            $result['images'] = $result->getPhotoLinksFromText();
            unset($result['text']);
        }

        return $result;
    }

    public function find(Request $request) {

        if ($request->get("created_at") === "asc") {
            $result = $this->model::orderBy("created_at");
        } else if ($request->get("created_at") === "desc") {
            $result = $this->model::orderByDesc("created_at");
        } else {
            $result = $this->model::where([]);
        }

        return $result->simplePaginate(self::PAGINATE_CONST, ['name', 'email']);
    }
}
