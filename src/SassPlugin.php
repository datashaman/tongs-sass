<?php

declare(strict_types=1);

namespace Datashaman\Tongs\Plugins;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

final class SassPlugin extends Plugin
{
    public function handle(array $files, callable $next): array
    {
        $ret = [];

        foreach ($files as $path => $file) {
            $extension = File::extension($path);

            if (in_array($extension, ['sass', 'scss'])) {
                $cmd = $this->command($file, $path);

                $process = new Process($cmd);
                $process->mustRun();

                $path = preg_replace(
                    "/\.${extension}$/",
                    '.css',
                    $path
                );

                $file['contents'] = $process->getOutput();
            }

            $ret[$path] = $file;
        }

        return $next($ret);
    }

    /**
     * @param array $file
     * @param string $path
     *
     * @return array
     */
    protected function command(array $file, string $path): array
    {
        $fullPath = $this->tongs()->source()->path($path);

        $options = $this->options
            ->map(
                static function ($value, $key) {
                    $option = '--' . Str::slug(Str::snake($key));

                    return "${option}='${value}'";
                }
            )
            ->all();

        return array_merge(['node-sass'], $options, [$fullPath]);
    }
}
