<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07-08-2020
 * Time: 3:20 PM
 */

namespace TungTT\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TungTT\Users\Http\Requests\UserRequest;
use TungTT\Users\Http\Services\UserService;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function index()
    {
        return view('users::index');
    }

    public function create()
    {
        $title = "Thêm mới người dùng";

        return view('users::form', compact('title'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->except('confirm_password');

        $this->userService->create($input);

        return redirect()->route('users.index');
    }

    public function checkUnique(Request $request)
    {
        $input = $request->all();

        return $this->userService->checkUnique($input);
    }
}