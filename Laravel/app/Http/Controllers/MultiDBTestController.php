<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Test;

class MultiDBTestController extends Controller
{
    //
    public function Test () {

    $command = "create";
    // List Command = ['create','delete','update']

        switch ($command) {
            case 'create':
                # code...
                // ============== INSERT TEST START ==================================
                $test_insert = DB::connection('mysql')->table('users')->insert([
                    ['email' => 'a@me.com', 'password' => '123456', 'phone'=> '0811', 'address' => 'street a'],
                    // ['email' => 'b@me.com', 'password' => '123456', 'phone'=> '0814', 'address' => 'street d'],
                ]);

                $test_insert2 = DB::connection('mysql2')->table('tests')->insert([
                    ['email' => 'a@me.com', 'test_date' => date('2022-08-04'), 'score'=> '90', 'subject' => 'Math'],
                    // ['email' => 'd@me.com', 'test_date' => date('2022-08-04'), 'score'=> '80', 'subject' => 'Geography'],
                ]);

                if($test_insert && $test_insert2)
                {
                    echo "Insert Success";
                }
                else
                {
                    echo "Insert Failed";
                }
                //============= INSERT TEST END =====================================
                break;
            
            case 'update':
                # code...
                //=========== UPDATE TEST START ====================================
                $test_update = DB::connection('mysql')->table('users')
                ->where('email', 'a@me.com')
                ->update(['password' => hash('md5','12345')]);

                $test_update2 = DB::connection('mysql2')->table('tests')
                ->where([['email', '=', 'a@me.com'], ['subject', '=', 'Math']])
                ->update(['score' => 98]);
                
                if($test_update2)
                {
                    echo "Update Success";
                }
                else
                {
                    echo "Update Failed";
                }
                //==================================================================
                break;

            case 'delete':
                # code...
                 //=========== DELETE TEST START ====================================
                    $test_delete= DB::connection('mysql')->table('users')->where('email', '=', 'a@me.com')->delete();
                    $test_delete2= DB::connection('mysql2')->table('tests')->where('email', '=', 'a@me.com')->delete();
                    
                    if($test_delete2)
                    {
                        echo "Delete Success";
                    }
                    else
                    {
                        echo "Delete Failed";
                    }
                //==================================================================
                break;
            
            default: 
                # code...
                  //============== READ TEST START ====================================
                    $test = DB::connection('mysql')->table('users')->where('email','=','a@me.com')->get();
                    
                    $test2 = DB::connection('mysql2')->table('tests')->get();

                    dd($test);
                    dd($test2);
                 //============== READ TEST END ======================================
                break;
        }
    }
    
}
