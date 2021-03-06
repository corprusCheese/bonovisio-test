<?php

namespace App\Http\Repositories;

class LetterRepository extends Repository {

    // репозиторий используется как книжный шкаф

    public function show(int $id) {
        return $this->model->findOrFail($id);
    }

    public function find($request) {

    }
}
