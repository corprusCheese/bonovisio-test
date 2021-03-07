<?php

namespace App\Http\Controllers;

use App\Http\Repositories\LetterRepository;
use App\Http\Requests\LetterCreateRequest;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * @OA\Post(
     *     path="/letter",
     *     operationId="letterSave",
     *     tags={"Letter"},
     *     summary="Create letters.",
     *     @OA\Response(
     *         response="200",
     *         description="Letter is created",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  title="id",
     *                  description="Id of the letter",
     *                  property="id",
     *                  type="integer",
     *                  example=1
     *              ),
     *          )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Letter is not created"
     *     ),
     *     @OA\RequestBody(
     *         description="Everything is fine",
     *         @OA\JsonContent(
     *              required={"email","name"},
     *              @OA\Property(
     *                  title="name",
     *                  description="name of user",
     *                  property="name",
     *                  type="string",
     *                  example="nikita"
     *              ),
     *              @OA\Property(
     *                  title="email",
     *                  description="email of user",
     *                  property="email",
     *                  type="string",
     *                  format="email",
     *                  example="nikita@yandex.ru"
     *              ),
     *              @OA\Property(
     *                  title="text",
     *                  description="letter text",
     *                  property="text",
     *                  type="string",
     *                  example="random text https://github.com/zircote/swagger-php/issues/25.jpg"
     *              ),
     *          )
     *     ),
     * )
     *
     * Create letters.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(LetterCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $result = false;
        if ($request->validated()) {
            $result = Letter::create($request->all());
        }

        return response()->json($result ? ["id" => $result['id']] : false, $result ? 200: 400);
    }

    /**
     * @OA\Get(
     *     path="/letter/{id}",
     *     operationId="letterShow",
     *     tags={"Letter"},
     *     summary="Show letter by request options.",
     *     @OA\Parameter(
     *         name="fields",
     *         in="query",
     *         description="Get special data",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             enum={"description", "images"}
     *         ),
     *     ),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="The ID of example",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Show description",
     *         @OA\JsonContent(
     *
     *              @OA\Property(
     *                  title="id",
     *                  description="Id of the letter",
     *                  property="id",
     *                  type="integer",
     *                  example=1
     *              ),
     *              @OA\Property(
     *                  title="name",
     *                  description="name of user",
     *                  property="name",
     *                  type="string",
     *                  example="nikita"
     *              ),
     *              @OA\Property(
     *                  title="email",
     *                  description="email of user",
     *                  property="email",
     *                  type="string",
     *                  format="email",
     *                  example="nikita@yandex.ru"
     *              ),
     *              @OA\Property(
     *                  title="text",
     *                  description="letter text",
     *                  property="text",
     *                  type="string",
     *                  example="random text https://github.com/zircote/swagger-php/issues/25.jpg"
     *              ),
     *              @OA\Property(
     *                  title="created_at",
     *                  description="created at",
     *                  property="created_at",
     *                  type="string",
     *                  example="2021-03-07T08:52:54.000000Z"
     *              ),
     *              @OA\Property(
     *                  title="updated_at",
     *                  description="updated at",
     *                  property="updated_at",
     *                  type="string",
     *                  example="2021-03-07T08:52:54.000000Z"
     *              ),
     *          )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         )
     *     ),
     * )
     *
     * Show letter by request options.
     *
     * @return \Illuminate\Http\JsonResponse
     */

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

    /**
     * @OA\Get(
     *     path="/letter",
     *     operationId="letterAll",
     *     tags={"Letter"},
     *     summary="Filter letter by request options.",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="The page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="created_at",
     *         in="query",
     *         description="Sort by created_at field",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             enum={"asc", "desc"}
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         )
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Not found",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         )
     *     ),
     * )
     *
     * Filter letter by request options.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function find(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this->repository->find($request);
        return response()->json($result, $result ? 200: 404, [], JSON_PRETTY_PRINT);
    }
}
