<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use App\Helpers\Utils;

class UpdateAnalytics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-analytics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update analytics view';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $analytics = DB::table('analytics');
        $this->updateTotal($analytics);
        $this->updatePageView($analytics);

        $this->info('Database updated successfully!');
    }

    private function updateTotal($analytics) {
        $analytics = $analytics->where('path', 'total');
        $totalVisits = 0;
		$analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::create(new Carbon(Utils::START_DATE), Carbon::now()), 1000);

		if(count($analyticsData)) { 
			foreach($analyticsData as $data) {
				$totalVisits += $data['screenPageViews'];
			}
		}
		$analytics->update([
			'view' => $totalVisits
		]);
    }

    private function updatePageView($analytics) {
        // get list post id
        $posts = DB::table('post')->pluck('id');

		foreach($posts as $post) {
			$url = "/xem/$post";
            $analytics = $analytics->where('path', $url);

            // calculate view
			$data = Utils::getUrlPageViewFromGA($url);
			$view = count($data) ? $data['screenPageViews'] : 0;
            
            // case update
            if($analytics->first()) {
                $analytics->update([
                    'view' => $view
                ]);
            } else {
                // case insert;
                DB::table('analytics')->insert([
                    'path' => $url,
                    'view' => $view
                ]);
            }
		}
    }
}
