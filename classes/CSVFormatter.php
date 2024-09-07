<?php

namespace classes;
class CSVFormatter implements FileFormatter
{
    public function generateFile(array $data, string $path): void
    {
        $file = fopen($path, 'w');
        fputcsv($file, array_keys($data[0]), ';');
        foreach ($data as $item) {
            fputcsv($file, $item, ';');
        }
        fclose($file);
    }
}


