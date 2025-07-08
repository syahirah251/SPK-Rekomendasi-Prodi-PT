<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); // Ensure this middleware matches your guard
    }

    public function logout()
    {
        Auth::guard('admin')->logout(); // Adjust the guard name if needed

        return redirect('/admin/login'); // Redirect to the admin login page
    }
}
