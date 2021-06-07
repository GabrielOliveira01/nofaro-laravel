<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\App\generateHash;
use App\Models\Hashs;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nofaro:test {name} {--requests=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save a hash';

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
        $name = $this->argument('name');
        
        $request = $this->options();
        
        $controller = app()->make('App\Http\Controllers\App\hash');
        $generateHash = app()->call([$controller, 'store'], ['request' => request()->merge(['name' => $name])]);
        
        Hashs::create([
            'input_string' => $generateHash->original['input_string'],
            'key_found' => $generateHash->original['key'],
            'generated_hash' => $generateHash->original['hash'],
            'number_attempts' => $request['requests'][0]
        ]);
        
        for ($i=0; $i <= $request['requests'][0] - 2; $i++) {

            $generateHash = app()->call([$controller, 'store'], ['request' => request()->merge(['name' => $generateHash->original['hash']])]);

            Hashs::create([
                'input_string' => $generateHash->original['input_string'],
                'key_found' => $generateHash->original['key'],
                'generated_hash' => $generateHash->original['hash'],
                'number_attempts' => $request['requests'][0]
            ]);
        }
    }
}
