<?php

namespace classes;
class JSONFormatter implements FileFormatter
{
    public function generateFile(array $data, string $path): void
    {
        $file = fopen($path, 'w');
        $json = json_encode($data, JSON_UNESCAPED_SLASHES);
        fwrite($file, $json);
        fclose($file);
    }
}


