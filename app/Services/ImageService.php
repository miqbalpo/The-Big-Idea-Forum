<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Menyimpan file gambar dan mengembalikan nama file yang unik.
     *
     * @param UploadedFile $file File gambar yang diupload
     * @param string $disk 'public' atau 's3' (sesuai konfigurasi filesystem)
     * @param string $path Direktori penyimpanan di dalam disk (misal: 'product_images')
     * @return string Nama file yang disimpan
     */
    public function uploadImages($files, string $path = 'images', string $disk = 'uploads_public'): array
    {
        $uploadedFileNames = [];

        // 1. Pastikan input selalu berupa array (jika inputnya single file, bungkus dengan array)
        $filesToProcess = is_array($files) ? $files : [$files];

        foreach ($filesToProcess as $file) {
            // Validasi apakah file benar-benar terupload
            // Pastikan elemennya benar-benar UploadedFile dan valid
            if ($file instanceof UploadedFile && $file->isValid()) {
                
                // 2. Buat nama file unik
                $fileName = time() . '-' . Str::random(10) . '.' . $file->extension();

                // 3. Simpan file
                Storage::disk($disk)->put($path . '/' . $fileName, file_get_contents($file->getRealPath()));

                $uploadedFileNames[] = $fileName;
            }
        }

        return $uploadedFileNames;
    }

    /**
     * Menghapus file gambar berdasarkan nama file.
     *
     * @param string $fileName Nama file yang akan dihapus
     * @param string $disk 'public' atau 's3'
     * @param string $path Direktori penyimpanan
     * @return bool
     */
    public function deleteImage(string $fileName, string $path = 'images', string $disk = 'uploads_public'): bool
    {
        $filePath = $path . '/' . $fileName;
        
        // Cek apakah file ada sebelum menghapus
        if (Storage::disk($disk)->exists($filePath)) {
            return Storage::disk($disk)->delete($filePath);
        }

        return false;
    }
}