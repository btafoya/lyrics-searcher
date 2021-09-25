<?php

use Chikis\LyricsSearcher\LyricsSearcher;

require 'vendor/autoload.php';

$text = LyricsSearcher::lyricsSearcher('Кино', 'Группа крови');
echo <<<EOL
<pre>
$text
</pre>
EOL;
