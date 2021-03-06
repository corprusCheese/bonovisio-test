<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LetterRepository;
use App\Http\Requests\LetterCreateRequest;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    // создание письма
    public function store(LetterCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $result = false;
        if ($request->validated()) {
            $result = Letter::create(array($request->all()));
        }

        return response()->json($result, $result ? 200: 400);
    }

    // нахождение письма
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $result = $this->repository->show($id);
        return response()->json($result, $result ? 200: 404);
    }

    // фильтрация
    public function find(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->repository->find($request);
        return response()->json($result, $result ? 200: 404);
    }
}
