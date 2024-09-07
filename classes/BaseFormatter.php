<?php

namespace classes;

use Exception;
use InvalidArgumentException;
use RuntimeException;

class BaseFormatter
{
private array $data;
private string $format;
private string $path;
private FileFormatter $formatter;
    public function __construct(array $data, string $format, string $path) {

        if (empty($data) || empty($format) || empty($path)) {
            throw new InvalidArgumentException("Один или несколько аргументов оказались пустыми");
        }

        $this->data = $data;
        $this->format = $format;

        if($this->validateFile($path)){
            $this->path = $path;
        }

        $this->setFormatter();
        $this->generateFile();
    }

    private function setFormatter(): void {
        switch ($this->format) {
            case 'csv':
                $this->formatter = new CSVFormatter();
                break;
            case 'json':
                $this->formatter = new JSONFormatter();
                break;
            case 'xml':
                $this->formatter = new XMLFormatter();
                break;
            default:
                throw new Exception("Неподдерживаемый формат файла");
        }
    }
    private function generateFile(): void {
        $this->formatter->generateFile($this->data, $this->path);
    }

    private function validateFile(string $path): bool{
        try {
            $folder = dirname($path);

            if (!is_dir($folder)) {
                if (!mkdir($folder, 0755, true)) {
                    throw new Exception("Не удалось создать папку: $folder");
                }
            }

            if (!is_writable($folder)) {
                throw new RuntimeException("Ошибка доступа: невозможно записать в файл '$folder'.");
            }

            return true;
        }
        catch (Exception $e){
            return false;
        }
    }
}