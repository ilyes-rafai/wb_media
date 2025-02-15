<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // return [
        //     ...parent::share($request),
        //     'auth' => [
        //         'user' => $request->user(),
        //     ],
        //     'flash' => [
        //         'success' => fn() => $request->session()->get('success'),
        //         'error' => fn() => $request->session()->get('error'),
        //     ],
        // ];

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user() ? $request->user()->load('roles')->load('quizzes') : null,
                'abilities' => $request->user() ? $this->getGateAbilities($request->user()) : [],
            ],
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
            ],
        ];
    }

    private function getGateAbilities($user): array
    {
        $abilities = [
            'is_admin' => Gate::forUser($user)->allows('is_admin'),
            'is_member' => Gate::forUser($user)->allows('is_member'),
            'is_subscriber' => Gate::forUser($user)->allows('is_subscriber'),
            'is_member_or_subscriber' => Gate::forUser($user)->allows('is_member_or_subscriber'),
            'is_mentor' => Gate::forUser($user)->allows('is_mentor'),
            'is_admin_or_mentor' => Gate::forUser($user)->allows('is_admin_or_mentor'),
            'is_admin_or_subscriber_or_mentor' => Gate::forUser($user)->allows('is_admin_or_subscriber_or_mentor'),
        ];

        return $abilities;
    }
}
