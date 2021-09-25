<?php

namespace Chikis\LyricsSearcher;

use PHPUnit\Framework\TestCase;

class LyricsSearcherTest extends TestCase
{

    public function dataProvider()
    {
        return [
            [0, 'taylor swift'],
            ['blank space', 0],
            ['blank space', 'taylor swift'],
            ['1111111111', '1111111111', true],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLyricsSearcher($artist, $song, $null = false)
    {
        if (!is_string($artist) || !is_string($song)) {
            $this->expectException(\InvalidArgumentException::class);
            LyricsSearcher::lyricsSearcher($artist, $song);
        } else {
            if (!$null) {
                $this->assertTrue(is_string(LyricsSearcher::lyricsSearcher($artist, $song)));
            } else {
                $this->assertTrue(is_null(LyricsSearcher::lyricsSearcher($artist, $song)));
            }
        }
    }
}
