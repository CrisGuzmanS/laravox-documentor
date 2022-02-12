<?php

namespace Laravox\Documentor\Console\Commands;

use Illuminate\Console\Command;

class DocumentorBuildCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'documentor:build {source?} {destiny?}';

    /**
     * @var string
     */
    protected $description = 'Build the documentation for your laravel project in a easy way';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->executeShell();
        return 0;
    }

    /**
     * Executes the documentation command
     * 
     */
    private function executeShell(): void
    {
        shell_exec($this->command());
    }

    /**
     * The command that will be executed
     * 
     * @return string
     */
    private function command(): string
    {
        $source = $this->source();
        $destiny = $this->destiny();
        return "php tools/phpDocumentor run -d $source -t $destiny";
    }

    /**
     * The source folder to document
     * 
     */
    private function source(): string
    {
        return $this->argument('source') ?? 'app/';
    }

    /**
     * The destiny folder where the files will be stored
     * 
     */
    private function destiny(): string
    {
        return $this->argument('destiny') ?? 'docs/';
    }
}
