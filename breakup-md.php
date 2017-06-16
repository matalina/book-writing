<?php
$base = __DIR__.'/';
$dir = $base.$argv[1].'/';

$output_dir = $dir.'scenes/';
$input_file = $dir.$argv[2];


$file = file_get_contents($input_file);

$parts = explode('#',$file);

foreach($parts as $key => $chapter) {
    $filename = '';
    $lines = explode("\n",$chapter);
    $title = $lines[0];
    $output = '#'.$chapter;
    $filename .= str_pad($key,3,'0',STR_PAD_LEFT).'-';
    
    $filename .= strtolower(preg_replace('/[^a-zA-Z0-9]/','-',$title)).'.md';
    
    $fh = fopen($output_dir.$filename, 'w+');
    fwrite($fh, $output);
    fclose($fh);
}

