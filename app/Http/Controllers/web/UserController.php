<?php /** @noinspection ALL */

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogInUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    // show register form
    public function create()
    {
        return view('user.create');
    }

    // Register user
    public function store(RegisterUserRequest $request)
    {
        // $formFields = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email', Rule::unique('users', 'email')],
        //     'password' => ['required', 'confirmed', 'min:4']
        // ]);

        $validatedData = $request->validated();

        $validatedData['password'] = bcrypt($validatedData['password']);

        $this->repository->registerUser($validatedData);


        return redirect('/login');
    }

    // show login form
    public function showLogin()
    {
        return view('user.login');
    }

    // login te user
    public function login(LogInUserRequest $request)
    {
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required']
        // ]);

        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        // Invalid credentials
        return back()->withErrors('message', 'Log In Failed');
    }

    // logout the user
    public function logout(Request $request)
    {
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        auth()->logout();

        return redirect('/');
    }
}
