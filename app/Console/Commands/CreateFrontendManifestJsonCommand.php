<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateFrontendManifestJsonCommand extends Command
{
    protected $signature = 'dorsi:create-frontend-manifest';

    protected $description = 'Create Frontend Manifest Json file';

    public function handle(): void
    {
        $manifestData = [
            [$this->admin(), public_path('site.webmanifest')],
        ];

        foreach ($manifestData as $data) {
            file_put_contents($data[1], json_encode($data[0], JSON_PRETTY_PRINT));

            $file = Str::of($data[1])->explode('/')->last();
            $this->info('File "'.$file.'" successfully created!');
        }
    }

    protected function admin(): array
    {
        return [
            'short_name' => config('dorsi.project_name'),
            'name' => config('dorsi.project_long_name'),
            'description' => config('dorsi.project_description'),
            'icons' => [
                [
                    'src' => 'favicons/favicon-16x16.png',
                    'sizes' => '16x16',
                    'type' => 'image/png',
                ],
                [
                    'src' => 'favicons/favicon-32x32.png',
                    'sizes' => '32x32',
                    'type' => 'image/png',
                ],
                [
                    'src' => 'favicons/android-chrome-192x192.png',
                    'sizes' => '192x192',
                    'type' => 'image/png',
                ],
                [
                    'src' => 'favicons/android-chrome-256x256.png',
                    'sizes' => '256x256',
                    'type' => 'image/png',
                ],
            ],
            'start_url' => '/',
            'display' => 'standalone',
            'orientation' => 'portrait-primary',
            'theme_color' => config('dorsi.project_theme_color'),
            'background_color' => config('dorsi.project_background_color'),
            'default_locale' => config('dorsi.language'),
            'manifest_version' => 1,
            'author' => config('dorsi.developer.name'),
            'version' => config('dorsi.project_version'),
        ];
    }
}
