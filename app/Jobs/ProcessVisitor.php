<?php

namespace App\Jobs;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class ProcessVisitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $visitor = Visitor::updateOrCreate([
            'ip_address' => $this->data['ip_address'],
        ],[
            'user_agent' => $this->data['user_agent'],
            'visited_at' => $this->data['visited_at'],
        ]);

        $visitor->visitedPages()->create([
            'visited_route' => $this->data['visited_route'],
            'visited_at' => $this->data['visited_at'],
        ]);

        Artisan::call('get:location', ['id' => $visitor->id]);
    }
}
