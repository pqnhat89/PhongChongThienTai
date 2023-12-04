<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Services\PostServices;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	private $totalVisits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->totalVisits = Utils::getTotalVisit();
    }
	
	/**
	 * Show homepage.
	 *
	 * @param Request $request
	 * @return Renderable
	 */
    public function index(Request $request): Renderable
    {
		if (isset($request->s)) {
			$posts = PostServices::getPostBySearch($request->s);
			return view('front-end.index', ['posts' => $posts, 'total' => $this->totalVisits]);
		}
	    return view('front-end.index', ['total' => $this->totalVisits]);
    }
	
	public function about() {
		return view('front-end.about', ['total' => $this->totalVisits]);
	}
	
	public function structure() {
		return view('front-end.structure', ['total' => $this->totalVisits]);
	}
	
	/**
	 * @return Renderable
	 */
	public function schedule(Request $request): Renderable
	{
		$conditions = [];
		if ($request->name) {
			$conditions[] = ['name', 'like', '%' . $request->name . '%'];
		}
		if ($request->from) {
			$conditions[] = ['from', '>=',  Carbon::createFromFormat('d/m/Y', $request->from)->startOfDay()];
		}
		if ($request->to) {
			$conditions[] = ['to', '<=',  Carbon::createFromFormat('d/m/Y', $request->to)->endOfDay()];
		}
		
		// query
		$schedules = DB::table('schedule')
			->where($conditions)
			->select(
				'*',
				DB::raw('DATE_FORMAT(`from`, "%d/%m/%Y") as fromDate'),
				DB::raw('DATE_FORMAT(`from`, "%H") as fromHour'),
				DB::raw('DATE_FORMAT(`to`, "%d/%m/%Y") as toDate'),
				DB::raw('DATE_FORMAT(`to`, "%H") as toHour')
			)
			->orderBy('from', 'desc')
			->paginate(20);
		
		
		$leader = DB::table('schedule')
			->select('name')
			->groupBy('name')
			->get();
		
		return view('front-end.schedule', ['schedules' => $schedules, 'leader' => $leader, 'total' => $this->totalVisits]);
	}
}
