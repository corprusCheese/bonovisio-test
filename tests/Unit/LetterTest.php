<?php

namespace Tests\Unit;

use App\Models\Letter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\TestCase;

class LetterTest extends TestCase
{
    /**
     * Test that examine method of getting possible images links from text
     */
    public function test_get_links_from_text() {

        $myExamineText = "ajsl
        https://laravel.ru/docs/v5/testing.jpg,
        https://laravel.ru/docs/v5/testing.img;
        https://laravel.ru/docs/v5/testing.gif
        https://laravel.ru/docs/v5/.gif
        https://laravel.ru/docs/v5/s.gifs
        dsafa.jpg";

        $letter = new Letter(["text" => $myExamineText]);
        $photos = $letter->getPhotoLinksFromText();

        $rightAnswer = [
            "https://laravel.ru/docs/v5/testing.jpg",
            "https://laravel.ru/docs/v5/testing.gif",
            "https://laravel.ru/docs/v5/s.gif"
            ];

        $result = $photos === $rightAnswer;
        $this->assertTrue($result);
    }
}
