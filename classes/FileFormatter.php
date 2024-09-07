<?php

namespace classes;

interface FileFormatter
{
    public function generateFile(array $data, string $path): void;
}