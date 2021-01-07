<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\AdminRequest;
use Modules\Category\Http\Services\CategoryService;
use Modules\Order\Http\Services\InvoiceService;
use Modules\Order\Http\Services\OrderService;

class AdminController extends Controller
{
    public function __construct(
    )
    {

    }

    public function index()
    {
        $active = 1;
        return view('admin.dashboard',compact('active'));
    }

}
