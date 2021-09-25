# lyrics-searcher for PHP
## What is it?
> A Simple Lyrics Finder That Just Works. This library is based on [alias-rahil/lyrics-searcher](https://github.com/alias-rahil/lyrics-searcher/).
## Programmatic usage:
### Installation
```bash 
composer install chikis/lyrics-searcher
```
### Usage
```php
<?php

use Chikis\LyricsSearcher\LyricsSearcher;

require('vendor/autoload.php');

$lyric = \Chikis\LyricsSearcher::lyricsSearcher('blank space', 'taylor swift');

echo '<pre>' . $lyric . '</pre>';
```
### Testing
To start, install --dev dependencies. Then run:
```bash 
composer test
```
## Contributing
Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/094ikis09/lyrics-searcher/issues).
## Show your support
Give a star if this project helped you!
## License
Copyright © 2021 [094ikis09](https://github.com/094ikis09).<br />
This project is [MIT](https://github.com/094ikis09/lyrics-searcher/blob/main/LICENSE) licensed.