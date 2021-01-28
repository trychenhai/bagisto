<?php

namespace Webkul\GraphQLAPI\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * Holds the execution signature of the command needed
     * to be executed for generating super user
     */
    protected $signature = 'bagisto_graphql:install';

    /**
     * Will inhibit the description related to this
     * command's role
     */
    protected $description = 'Installing Bagisto GraphQL API Extension';

    public function __construct()   {
        parent::__construct();
    }

    /**
     * Does the all sought of lifting required to be performed for
     * generating a super user
     */
    public function handle()
    {
        // running `composer require nuwave/lighthouse`
        $this->warn('Step: Adding lighthouse dependency nuwave/lighthouse...');
        $lighthouse = shell_exec('composer require nuwave/lighthouse');
        $this->info($lighthouse);

        // running `composer require mll-lab/laravel-graphql-playground`
        $this->warn('Step: Installing GraphQL DevTool...');
        $playground = shell_exec('composer require mll-lab/laravel-graphql-playground');
        $this->info($playground);
        
        // running `php artisan vendor:publish --provider="Nuwave\Lighthouse\LighthouseServiceProvider" --tag=config`
        $this->warn('Step: Publishing Lighthouse Configuration File...');
        $configuration = shell_exec('php artisan vendor:publish --provider="Nuwave\Lighthouse\LighthouseServiceProvider" --tag=config');
        $this->info($configuration);
        
        $this->comment('Success: Bagisto GraphQL API has been configured successfully.');
    }
}