<?php


namespace Chikis;


class LyricsSearcher
{
    private static $delims = [
        '</div></div></div></div><div class="hwc"><div class="BNeawe tAd8D AP7Wnd"><div><div class="BNeawe tAd8D AP7Wnd">',
        '</div></div></div><div><span class="hwc"><div class="BNeawe uEec3 AP7Wnd">',
    ];

    private static $url = 'https://www.google.com/search?q=';

    private static function validateInput(array $array)
    {
        if (count($array) !== 2) {
            throw new \InvalidArgumentException("Invalid arguments");
        }
        foreach ($array as $item) {
            if (!is_string($item)) {
                throw new \InvalidArgumentException("Invalid arguments");
            }
        }
    }

    private static function getShuffledArr(array $array)
    {
        $temp = $array;
        shuffle($temp);
        return $temp;
    }

    private static function getSearchQueries($artist, $song)
    {
        return self::getShuffledArr(
            [
                urlencode("{$artist} {$song} song"),
                urlencode("{$artist} {$song} lyrics"),
                urlencode("{$artist} {$song} song lyrics"),
                urlencode("{$artist} {$song}"),
            ]
        );
    }

    /**
     * @param string $artist
     * @param string $song
     *
     * @return ?string
     */
    public static function lyricsSearcher($artist, $song)
    {
        self::validateInput([$artist, $song]);
        $searchQueries = self::getSearchQueries($artist, $song);
        $lyricsArr = array_map(
            function ($searchQuery) {
                try {
                    $data = file_get_contents(self::$url . $searchQuery);
                    return explode(self::$delims[1], explode(self::$delims[0], $data)[1])[0];
                } catch (\Exception $e) {
                    return '';
                }
            },
            $searchQueries
        );
        $lyrics = null;
        foreach ($lyricsArr as $item) {
            if ($item !== '') {
                $lyrics = $item;
                break;
            }
        }
        if ($lyrics === null) {
            return null;
        }
        $lyrics = preg_split('/\r\n|\r|\n/', $lyrics);
        $lines = [];
        foreach ($lyrics as $lyric) {
            try {
                $lines[] = \Html2Text\Html2Text::convert($lyric, ['ignore_errors' => true]);
            } catch (\Exception $e) {

            }
        }
        return implode(PHP_EOL, $lines);
    }
}