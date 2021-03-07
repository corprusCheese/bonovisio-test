<?php

namespace App\Http\Repositories;

use App\Models\Letter;

class LetterRepository extends Repository {

    // репозиторий используется как книжный шкаф

    public function show(int $id, array $fields, ?bool $images = false) {
        /** @var ?Letter $result */
        $result = $this->model->findOrFail($id, $fields);

        if ($images && $result) {
            $result['images'] = $result->getPhotoLinksFromText();
            unset($result['text']);
        }

        return $result;
    }

    public function find($request) {

    }
}
