<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    protected $avatar = 'https://painrehabproducts.com/wp-content/uploads/2014/10/facebook-default-no-profile-pic.jpg';
    protected $username = 'perisicnikola37';
    protected $favicon = 'https://avatars.githubusercontent.com/u/47703742?s=280&v=4';

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'flash' => [
                'success' => session('success') ?? null,
                'delete' => session('delete') ?? null,
            ],
            'counts' => [
                'userCount' => User::count(),
                'roleCount' => Role::count(),
            ],
            'auth' => [
                'user' => Auth::user()
            ],
            'currentYear' => date('Y'),
            'avatar' => $this->avatar,
            'username' => $this->username,
            'favicon' => $this->favicon,
        ]);
    }
}
