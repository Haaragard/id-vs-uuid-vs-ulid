<?php

namespace App\Console\Commands;

use App\Models\IdUser;
use App\Models\UlidUser;
use App\Models\UserInfo;
use App\Models\UuidUser;
use Illuminate\Console\Command;

class CreateTestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-test-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $entries = (int)$this->ask('How many entries would you like to generate for each entity case?');
        $relatedEntries = (int)$this->ask('How many related entries would you like to generate for each entity case?');

        // Generate IdUsers
        $this->createIdUsers($entries, $relatedEntries);

        // Generate UuidUsers
        $this->createUuidUsers($entries, $relatedEntries);

        // Generate UlidUsers
        $this->createUlidUsers($entries, $relatedEntries);
    }

    /**
     * @param int $quantity
     * @param int $relatedQuantity
     * @return void
     */
    private function createIdUsers(int $quantity, int $relatedQuantity): void
    {
        $this->createMany(
            IdUser::class,
            $quantity,
            $relatedQuantity
        );
    }

    /**
     * @param int $quantity
     * @param int $relatedQuantity
     * @return void
     */
    private function createUuidUsers(int $quantity, int $relatedQuantity): void
    {
        $this->createMany(
            UuidUser::class,
            $quantity,
            $relatedQuantity
        );
    }

    /**
     * @param int $quantity
     * @param int $relatedQuantity
     * @return void
     */
    private function createUlidUsers(int $quantity, int $relatedQuantity): void
    {
        $this->createMany(
            UlidUser::class,
            $quantity,
            $relatedQuantity
        );
    }

    /**
     * @param string $model
     * @param int $quantity
     * @param int $relatedQuantity
     * @return void
     */
    private function createMany(
        string $model,
        int $quantity,
        int $relatedQuantity
    ): void {
        $this->newLine(3);
        $modelName = str($model)->replace('::class', '');

        $this->info("Creating {$modelName} {$quantity} mock data with {$relatedQuantity} relations");

        $creationStart = now();

        $model::factory($quantity)
            ->hasUserInfos($relatedQuantity)
            ->create();

        $creationEnd = now();

        $this->newLine();
        $timeDiff = $creationEnd->diffInMilliseconds($creationStart);
        $this->info("DB saving endend in {$timeDiff} milliseconds.");
    }
}
