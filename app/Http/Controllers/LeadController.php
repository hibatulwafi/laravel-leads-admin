<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = DB::table('leads')->get();
        return view('leads.index', compact('leads'));
    }

    public function register(Request $request)
    {
        $name = $request->json('name');
        $phone = $request->json('phone');
        $email = $request->json('email');
        $referral = $request->json('referral');
        $existingLead = DB::table('leads')->select('name','phone','email')->where('phone', $phone)->first();

        if (!$existingLead) {
            $result = DB::table('leads')->insert([
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'referral' => $referral,
                'step' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Logging
            $method = 'post';
            $data = json_encode($request->json()->all());
            $this->logging($phone,$method,$data);
            // End Logging

            if ($result) {
                return response()->json(['success' => true], 201);
            } else {
                return response()->json(['success' => false], 500); // 500 untuk internal server error
            }
        } else {
            // Logging
            $method = 'put';
            $data = json_encode($request->json()->all());
            $this->logging($phone,$method,$data);
            // End Logging
            return response()->json(['message' => 'Data dengan nomor telepon tersebut sudah ada', 'success' => true], 201);
        }
    }

    public function step1(Request $request)
    {
        $data = $request->json()->all();
        $name = $request->json('name');
        $phone = $request->json('phone');
        $email = $request->json('email');
        $step = $request->json('step');

        $result = DB::table('leads')
            ->where('phone', $phone)
            ->update([
                'step' => $step,
                'updated_at' => now(),
            ]);

        if ($result) {
            return response()->json(['success' => true], 201);
        } else {
            return response()->json(['success' => false], 500); // 500 untuk internal server error
        }
    }

    public function step2(Request $request)
    {
        $data = $request->json()->all();
        $name = $request->json('name');
        $phone = $request->json('phone');
        $email = $request->json('email');
        $step = $request->json('step');

        $result = DB::table('leads')
            ->where('phone', $phone)
            ->update([
                'step' => $step,
                'updated_at' => now(),
            ]);

        if ($result) {
            return response()->json(['success' => true], 201);
        } else {
            return response()->json(['success' => false], 500);
        }
    }

    public function step3(Request $request)
    {
        $data = $request->json()->all();
        $name = $request->json('name');
        $phone = $request->json('phone');
        $email = $request->json('email');
        $step = $request->json('step');

        $result = DB::table('leads')
            ->where('phone', $phone)
            ->update([
                'step' => $step,
                'updated_at' => now(),
            ]);

        if ($result) {
            return response()->json(['success' => true], 201);
        } else {
            return response()->json(['success' => false], 500); // 500 untuk internal server error
        }
    }

    public function logging($phone,$method,$data){
        
        DB::table('logs')->insert([
            'phone' => $phone,
            'method' => $method,
            'data' => $data,
        ]);

        return;
    }
}
