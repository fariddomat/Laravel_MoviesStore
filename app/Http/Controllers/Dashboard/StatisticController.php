<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{


    public function statistic_by_day(Request $request)
    {
        $orders = Order::selectRaw("movies_id, date_format(created_at, '%D %M %y') day")
            ->get()
            ->groupBy('day');
        $s_day = [];
        foreach ($orders as $key => $order) {
            $price = 0;
            foreach ($order as $key => $o) {
                $movies = Movie::where('id', $o->movies_id)->first();
                $price += $movies->price;
            }
            $day = $o->day;
            $s_day[] = [$day, $price, $order->count()];
        }
        // dd($s_day);
        // return view('dashboard.statistics.day', compact('orders', 's_day'));

        $s_day = $this->paginate($s_day);
        $s_day->setPath('day');
        return view('dashboard.statistics.day', compact('s_day'));
    }

    public function statistic_by_month(Request $request)
    {

        $orders = Order::selectRaw("movies_id, date_format(created_at, '%M %y') month")
            ->get()
            ->groupBy('month');
        $s_month = [];
        foreach ($orders as $key => $order) {
            $price = 0;
            foreach ($order as $key => $o) {
                $movies = Movie::where('id', $o->movies_id)->first();
                $price += $movies->price;
                $month = $o->month;
            }
            $s_month[] = [$month, $price, $order->count()];
        }
        // return view('dashboard.statistics.month', compact('s_month'));

        $s_month = $this->paginate($s_month);
        $s_month->setPath('month');

        return view('dashboard.statistics.month', compact('s_month'));

        // foreach ($s_month as $index => $s_months) {
        //     dd($s_months[0]);
        //  }
    }

    public function statistic_by_user(Request $request)
    {
        $users = User::paginate(5);
        // echo $user->movie->count();
        // foreach ($user->movie as $movie) {
        //     // You may access the intermediate table using the pivot attribute on the models:
        //     echo $movie->name . "<br>";
        // }

        return view('dashboard.statistics.user',compact('users'));
    }

    public function statistic_by_movie(Request $request)
    {
        $movies = Movie::paginate(5);
        // dd(Auth::user()->movie->count());

        // echo ;
        // foreach (Auth::user()->movie as $movie) {
        //     // You may access the intermediate table using the pivot attribute on the models:
        //     // echo $movie->pivot->created_at . "<br>";
        //     // dd($movie->name);
        // }

        return view('dashboard.statistics.movie',compact('movies'));
    }

    public function order_statistics(Request $request)
    {
        $orders=Order::orderBy('created_at', 'DESC')->paginate(5);
        return view('dashboard.statistics.orders',compact('orders'));

    }


    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
