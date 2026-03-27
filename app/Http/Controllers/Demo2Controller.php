<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo2Controller extends Controller
{
    public function adminDashbaord(Request $request) {
        return response()->json([            
            'message' => 'Admin Dashboard: Welcome ' . $request->user()->name,
            'user' => $request->user(),
            'roles' => $request->user()->roles->pluck('name')
        ]);
    }

    public function editorContent(Request $request) {
        $user = $request->user();
        if(!$user->hasRole('Editor')) {
            abort(403, "Unauthorized");
        }
        return response()->json([            
            'message' => 'Editor Content: Welcome ' . $request->user()->name,
            'user' => $request->user(),
            'roles' => $request->user()->roles->pluck('name')
        ]);
    }

    public function managerReports(Request $request) {
        return response()->json([            
            'message' => 'Manager Reports: Welcome ' . $request->user()->name,
            'user' => $request->user(),
            'roles' => $request->user()->roles->pluck('name')
        ]);
    }

    public function customerDashboard(Request $request) {
        return response()->json([            
            'message' => 'Customer Dashboard: Welcome ' . $request->user()->name,
            'user' => $request->user(),
            'roles' => $request->user()->roles->pluck('name')
        ]);
    }   

    public function viewerDashboard(Request $request) {
        return response()->json([            
            'message' => 'Viewer Dashboard: Welcome ' . $request->user()->name,
            'user' => $request->user(),
            'roles' => $request->user()->roles->pluck('name')
        ]);
    }
}
