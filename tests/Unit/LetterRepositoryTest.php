<?php

namespace Tests\Unit;

use App\Http\Repositories\LetterRepository;
use App\Models\Letter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LetterRepositoryTest extends TestCase
{
    use HasFactory,RefreshDatabase;

    public function test_show_common() {

        $letters = Letter::factory(1)->create();
        $letterRepository = resolve(LetterRepository::class);
        $firstLetterArray = $letters[0]->attributesToArray();

        // обычный случай
        $letterArray = $letterRepository->show(1, ["*"])->attributesToArray();
        $result = $letterArray == $firstLetterArray;

        $this->assertTrue(boolval($result));
    }

    public function test_show_fields() {

        $letters = Letter::factory(1)->create();
        $letterRepository = resolve(LetterRepository::class);
        $firstLetterArray = $letters[0]->attributesToArray();

        // случай когда надо получить определенные поля
        $letterArray = $letterRepository->show(2, ["name", "email", "text"])->attributesToArray();

        $result = $letterArray['name'] == $firstLetterArray['name']
            && $letterArray['email'] == $firstLetterArray['email']
            && $letterArray['text'] == $firstLetterArray['text']
            && array_keys($letterArray) == ["name", "email", "text"];

        $this->assertTrue(boolval($result));
    }

    public function test_show_images() {
        // получить ссылки на изображения

        $letters = Letter::factory(1)->create();
        $letterRepository = resolve(LetterRepository::class);

        $letterArray = $letterRepository->showOnlyImages(3)->attributesToArray();
        $result = array_keys($letterArray) == ["images"];

        $this->assertTrue(boolval($result));
    }

    public function test_find() {
        $letters = Letter::factory(1)->create();
        $letterRepository = resolve(LetterRepository::class);

        $letters = $letterRepository->find();
        $result = array_keys($letters->items()[0]->toArray()) == ["name", "email"];

        $this->assertTrue(boolval($result));
    }
}
