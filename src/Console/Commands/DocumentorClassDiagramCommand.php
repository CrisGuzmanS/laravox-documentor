<?php

namespace Laravox\Documentor\Console\Commands;

use Illuminate\Console\Command;

class DocumentorClassDiagramCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documentor:class-diagram {source?} {destiny?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the class diagram image of your project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        shell_exec($this->command());
        return 0;
    }

    /**
     * Command to execute
     * 
     */
    private function command(): string
    {
        return "tools/phuml phuml:diagram -r -a -i -o -p dot "
            . $this->source() . " "
            . $this->destiny()
            . $this->name()
            . ".png";
    }

    /**
     * Source folder for the project
     * 
     */
    public function source(): string
    {
        return $this->argument('source') ?? 'app/';
    }

    /**
     * Destiny folder for the project
     * 
     */
    public function destiny(): string
    {
        return $this->argument('destiny') ?? 'docs/';
    }

    /**
     * filename (without exetension)
     * 
     */
    public function name(): string
    {
        return $this->argument('name') ?? 'class-diagram';
    }
}
