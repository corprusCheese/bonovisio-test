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
            $result = Letter::create($request->all());
        }

        return response()->json($result ? $result['id'] : false, $result ? 200: 400);
    }

    // нахождение письма
    public function show(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        switch ($request->get('fields')) {
            case "description":
                $fields = ['name', 'email', 'text'];
                $images = false;
                break;
            case "images":
                $fields = ["text"];
                $images = true;
                break;
            default:
                $fields = ["*"];
                $images = false;
                break;
        }

        $result = $this->repository->show($id, $fields, $images);

        return response()->json($result, $result ? 200: 404, [], JSON_PRETTY_PRINT);
    }

    // фильтрация
    public function find(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->repository->find($request);
        return response()->json($result, $result ? 200: 404, [], JSON_PRETTY_PRINT);
    }
}
