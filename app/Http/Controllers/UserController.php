<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    

class UserController extends Controller
{
    public function index()
    {
        // // update data user dengan Eloquent Model
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // update data user
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data); // insert data user
        
        // $user = UserModel::all(); 
        // return view('user', ['data' => $user]);
        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(404);
        // $user = UserModel::findOrFail(1);
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view('user', ['data' => $user]);

        // $user = UserModel::where('level_id', 2)->count();
        // // dd($user); // langkah 2: aktifkan untuk melihat output, langkah 3: nonaktifkan agar tampil di view
        // return view('user', ['data' => $user]);

        // $user = UserModel::firstOrCreate(
        //     [ 
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua ',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ]

            // $user = UserModel::firstOrNew(
            //     ['username' => 'manager',
            //     'nama' => 'Manager',
            //     ]
            // );
        $user = UserModel::firstOrNew(
            ['username' => 'manager33'],
            ['nama' => 'Manager Tiga Tiga',
            'password' => Hash::make('12345'),
            'level_id' => 2
            ]
        );
        $user->save();

        return view('user', ['data' => $user]);
    }
}
