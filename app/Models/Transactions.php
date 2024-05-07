<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transactions extends Model
{
    use HasFactory;

    public function transanctionType($value){
        $data = "";
        if($value == 1){
            $data = "Deposit";
        }else{
            $data = "Withdrawal";
        }
        return $data;
    }

    public function CalculateFee($amount, $userId, $accountType){
        $fee = 0;
        if($accountType == 1){    
            $totalAmountThisMonth = Transactions::where('user_id', $userId)
                                    ->where('transanction_type', 2)
                                    ->whereYear('created_at', '=', Carbon::now()->year)
                                    ->whereMonth('created_at', '=', Carbon::now()->month)
                                    ->sum('amount');
            if (date("l") === "Friday"){
                $fee = 0;
            }elseif($totalAmountThisMonth < 5000){
                $fee = 0;
            }else{
                if($amount <= 1000){
                    $fee = 0; 
                }else{
                    $restAmount = $amount - 1000;
                    $fee = $restAmount * 0.015;
                }                
            }            
        }else{
            $totalAmount = Transactions::where('user_id', $userId)
                              ->where('transanction_type', 2)
                              ->sum('amount');
            if($totalAmount > 50000){
                $fee = $amount * 0.015;
            }else{
                $fee = $amount * 0.025;
            }            
        }
        return $fee;
    }
}
