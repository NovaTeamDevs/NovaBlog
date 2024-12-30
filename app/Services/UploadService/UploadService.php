<?php

namespace App\Services\UploadService;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    private string $folder_name = 'files';
    private string $path = 'uploads';
    private bool $use_default_name  = false;

    public function upload(UploadedFile $file): string|bool
    {
        $filname = $this->getFilename($file);

        return Storage::drive('public')->putFileAs($this->concatPath(), $file, $filname);
    }

    public function delete(string $file_name): bool
    {
        return Storage::drive('public')->delete($file_name);
    }

    private function generateName(): string
    {
        return Str::uuid()->toString();
    }

    private function getFilename(UploadedFile $file)
    {
        if ($this->use_default_name) {
            return $file->getClientOriginalName();
        }

        return sprintf('%s.%s', $this->generateName(), $file->getClientOriginalExtension());
    }

    private function createDirectoryIfNotExists(string $path)
    {
        File::ensureDirectoryExists($path, 0755, true);
    }

    private function concatPath(): string
    {
        $path =  $this->path . DIRECTORY_SEPARATOR . $this->folder_name;
        $this->createDirectoryIfNotExists($path);
        return $path;
    }

    public function folder(string $folder_name): self
    {
        $this->folder_name = $folder_name;
        return $this;
    }

    public function path(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    public function useDefaultName(): self
    {
        $this->use_default_name = true;
        return $this;
    }
}