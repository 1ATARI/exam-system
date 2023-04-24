<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\Role;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['results', 'roles'])->paginate(15);

        return view('admin.users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create' ,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:'.User::class],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role'=>['required' , Rule::in([1,2])],
            'image'=>'image',
        ]);
        $request_data = $request->except(['password' , 'role' , 'image']);


        if ($request->image) {


            $request_data['image'] = $request->file('image')->store('users_image', 'public_uploads');

        }
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);
        $role = Role::findOrFail($request->role);
        $user->roles()->save($role);

        Flasher::addSuccess('User created successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

         $avg_result= number_format($user->results()->avg('percentage') , 1);
        $results = $user->results()->with( 'exam.course' ,'exam.questions')->get();

        $examsByMonth = ExamSession::select(
            DB::raw('COUNT(*) as exams_count'),
            DB::raw('MONTH(created_at) as month')
        )
                ->where('user_id', $user->id)
                ->groupBy('month')->whereYear('created_at', date('Y'))
                ->get();

        $data = [];
        $labels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        foreach ($labels as $key => $label) {
            $data[$key] = 0;
            foreach ($examsByMonth as $exams) {
                if ($exams->month == $key + 1) {
                    $data[$key] = $exams->exams_count;
                    break;
                }
            }
        }
        return view('admin.users.show' , compact(['user' ,'labels' ,'data' , 'avg_result' ,'results']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit' , compact('user' ,'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role'=>['required' , Rule::in([1,2])],
            'image'=>'image',

        ]);

        $request_data = $request->except(['password' , 'role' , 'image']);

        if ($request->image) {
            if($user->image != 'users_image/user.png'){

                Storage::disk('public_uploads')->delete($user->image);


            }
            $request_data['image'] = $request->file('image')->store('users_image', 'public_uploads');

        }

        $request_data['password'] = bcrypt($request->password);




        $user->update($request_data);

        if ($request->role){
            $user->roles()->detach($user->firstRole()->id);
            $user->roles()->attach($request->role);

        }

        Flasher::addSuccess('User updated successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->image != 'users_image/user.png'){

            Storage::disk('public_uploads')->delete( $user->image);
        }
        $user->delete();
        Flasher::addSuccess('User deleted successfully.');

        return redirect()->route('admin.users.index');
    }
}
