<?php
$base = __DIR__.'/';
$dir = $base.$argv[1].'/';
$files = scandir($dir.'scenes');

$newFile = fopen($dir.$argv[2], 'w+');

sort($files);

foreach($files as $file) {
    if(preg_match('/[0-9]{3}/',$file)) {
        $string = file_get_contents($dir.'scenes/'.$file).PHP_EOL.PHP_EOL;
        //$newFile = fopen($dir.'/new/'.$file.'.mmd', 'w+');
        fwrite($newFile, $string);
    }
}

fclose($newFile);


