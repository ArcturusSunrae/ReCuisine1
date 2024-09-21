@php
    use App\Enums\Role;

    $user = Auth::user();
    //dd($user, $user ? $user->role : 'No user logged in');

@endphp




@if(auth()->check() && (auth()->user()->role === \App\Enums\Role::admin ))
    <a href="{{ route('admin.dashboard') }}" class="btn bg-white text-[#D2B48C] font-semibold text-lg md:text-xl px-8 py-4 rounded-full transition duration-300 hover:bg-[#C19A6B] hover:text-white shadow-lg transform hover:scale-105">Dashboard</a>
@endif

@if(auth()->check() && auth()->user()->role === \App\Enums\Role::supplier)
    <a href="{{ route('supplier.dashboard') }}" class="btn bg-white text-[#D2B48C] font-semibold text-lg md:text-xl px-8 py-4 rounded-full transition duration-300 hover:bg-[#C19A6B] hover:text-white shadow-lg transform hover:scale-105">Dashboard</a>
@endif

{{--<a href="{{ route('supplier.dashboard') }}" class="btn bg-white text-[#D2B48C] font-semibold text-lg md:text-xl px-8 py-4 rounded-full transition duration-300 hover:bg-[#C19A6B] hover:text-white shadow-lg transform hover:scale-105">--}}
{{--    Dashboard--}}
{{--</a>--}}




