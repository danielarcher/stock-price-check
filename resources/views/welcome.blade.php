@extends('layouts.main')
@section('content')
    <div class="max-w-2xl mx-auto lg:bg-gradient-to-r md:bg-gradient-to-r from-sky-400 via-sky-500 to-blue-600 relative mb-12 rounded-3xl transform -rotate-3 translate-y-14 py-4 font-body ">
        <div class="bg-white h-full transform rotate-3 p-16 shadow-lg rounded-3xl border-t-2 border-indigo-600">

            <!-- Logo -->
            @include('three-logo')

            <p class="text-lg my-2">This was a very fun project, so please log in with your Facebook account and enjoy this wonderful experience.</p>

            <!-- Facebook -->
            @include('facebook-login')

            <hr class="mt-4">

            <!-- Stock -->
            @include('stock-form')
        </div>
    </div>
@endsection
