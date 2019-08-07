<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResoucre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view', $request->user());

//        factory(User::class, 10)->create();

        return UserResoucre::collection(User::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', $request->user());

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'پرکردن فیلد نام اجباری است.',
            'email.required' => 'پرکردن فیلد ایمیل اجباری است.',
            'email.unique' => 'این ایمیل توسط شخص دیگری انتخاب شده است.',
            'password.required' => 'پرکردن فیلد رمز اجباری است.',
            'role.required' => 'لطفا سمت کاربر را انتخاب کنید.',
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->name),
            'role' => $request->role,
        ];

        if (User::create($user)) {
            return (new UserResoucre($user))->
            additional([
                'message' => 'کاربر جدید با موفقیت اضافه شد'
            ]);
        }
        return response()->json([
            'message' => 'خطایی در ثبت اطلاعات رخ داده است'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return (new UserResoucre($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'email'
            ],

        ], [
            'name.required' => 'پرکردن فیلد نام اجباری است.',
            'email.required' => 'پرکردن فیلد ایمیل اجباری است.',
            'email.unique' => 'این ایمیل توسط شخص دیگری انتخاب شده است.',
            'role.required' => 'لطفا سمت کاربر را انتخاب کنید.',
        ]);

        if ($user->update($data)) {
            return (new UserResoucre($user))->
            additional([
                'message' => 'اطلاعات کاربر با موفقیت ویرایش شد'
            ]);
        }
        return response()->json([
            'message' => 'خطایی در ثبت اطلاعات رخ داده است'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        if ($user->delete()) {
            return response()->json([
                'message' => 'کاربر با موفقیت حذف شد.'
            ], 200);
        }
        return response()->json([
            'message' => 'خطایی در ثبت اطلاعات رخ داده است'
        ], 402);
    }

    /**
     *
     */
    public function myInfo(Request $request)
    {
        return (new UserResoucre($request->user()));
    }
}
