<?php


namespace App\Services;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UserService
{
    /**
     * Load all users with given role
     * @param string $role
     * @return mixed
     */
   public function getUsersByRole(string $role)
   {
       return User::whereHas('roles', function ($query) use ($role) {
           $query->where('name', 'like', $role);
       })->get();
   }

    /**
     * Get role of currently logged user
     * @return string
     */
   public static function getAuthRoles()
   {
       try {
           if (Auth::user()) {
               return Auth::user()->roles[0]->name;
           }
       }catch (\Exception $exception){}
       return "guest";
   }

    /**
     * Load user data
     * @param $user
     * @return array
     */
    public function getUserData($user)
    {
        return [
            "id" => $user->id,
            "name" => $user->name,
            "surname" => $user->surname,
            "email" => $user->email,
            "address" => $user->address,
            "phone" => $user->phone
        ];
    }
}
