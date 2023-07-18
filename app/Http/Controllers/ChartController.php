<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\User;

class ChartController extends Controller
{
    public function useChart1(){
        $passes = Pass::SelectRaw('MONTH(created_at) as month, COUNT(*) as count')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();
        $labels = [];
        $data = [];
        $colors = ['#78281F','#4A235A','#154360','#0E6251','#239B56','#AF7AC5','#D4AC0D','#D35400','#5D6D7E','#AF7AC5','#EC7063','#5DADE2'];

        for ($i=1;$i<12;$i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;

            foreach($passes as $pass){
                if($pass->month == $i){
                    $count = $pass->count;
                    break;
                }
            }
            array_push($labels, $month);
            array_push($data, $count);
        }

        $datasets = [
            [
                'label' => 'passes',
                'data' => $data,
                'backgroundColor' => $colors
            ]
        ];
        //return dd($datasets);
        return view('dashboard', compact('datasets','labels'));
    }

    // public function useChart2(){

    //     $users = User::SelectRaw('MONTH(created_at) as month, COUNT(*) as count')
    //                 ->whereYear('created_at', date('Y'))
    //                 ->groupBy('month')
    //                 ->orderBy('month')
    //                 ->get();
    //     $labels1 = [];
    //     $data1 = [];
    //     $colors = ['#78281F','#4A235A','#154360','#0E6251','#239B56','#AF7AC5','#D4AC0D','#D35400','#5D6D7E','#AF7AC5','#EC7063','#5DADE2'];

    //     for ($i=1;$i<12;$i++){
    //         $month = date('F',mktime(0,0,0,$i,1));
    //         $count = 0;

    //         foreach($users as $user){
    //             if($user->month == $i){
    //                 $count = $user->count;
    //                 break;
    //             }
    //         }

    //         array_push($labels1, $month);
    //         array_push($data1, $count);
    //     }

    //     $datasets1 = [
    //         [
    //             'label' => 'users',
    //             'data' => $data1,
    //             'backgroundColor' => $colors
    //         ]
    //     ];
    //     return dd($datasets1);
    //     //return view('dashboard', compact('datasets','labels'));
    // }
}
