<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;

class WebsocketsStatisticsEntriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:websockets_statistics_entries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is to monitor the websockets database statistics entries';

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
        $cutoffDate = Carbon::now()->subHours(188); // Menghitung tanggal 188 jam yang lalu

        DB::table('websockets_statistics_entries')->where('created_at', '<', $cutoffDate)->delete();

        return Command::SUCCESS;
    }
}
