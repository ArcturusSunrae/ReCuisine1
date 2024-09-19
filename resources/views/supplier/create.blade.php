<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl leading-tight" style="color: #f3ede8;">--}}
{{--            {{ __('Create New Food Item') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <div style="padding-top: 3rem; padding-bottom: 3rem; background-color: #f7f7f7;">
        <div style="max-width: 1120px; margin: 0 auto; padding: 1.5rem; background-color: #f4f0e6; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 0.5rem;">
            <div style="padding: 1.5rem;">
                <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1rem; color: #5a3e36;">Add Food Item</h2>

                <form action="{{ route('supplier.store') }}" method="POST" style="padding: 2rem; background-color: #ffffff; border-radius: 0.5rem;">
                    @csrf

                    <div style="margin-bottom: 1rem;">
                        <label for="name" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.5rem; color: #5a3e36;">Name</label>
                        <input type="text" value="{{ $fooditem->title }}" name="name" id="name"
                               style="width: 100%; padding: 0.5rem; border: 1px solid #d9d0c3; border-radius: 0.25rem; background-color: #fdf8f3; color: #333;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="description" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.5rem; color: #5a3e36;">Description</label>
                        <input type="text" value="{{ $fooditem->description }}" name="description" id="description"
                               style="width: 100%; padding: 0.5rem; border: 1px solid #d9d0c3; border-radius: 0.25rem; background-color: #fdf8f3; color: #333;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="category" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.5rem; color: #5a3e36;">Category</label>
                        <input type="text" value="{{ $fooditem->category }}" name="category" id="category"
                               style="width: 100%; padding: 0.5rem; border: 1px solid #d9d0c3; border-radius: 0.25rem; background-color: #fdf8f3; color: #333;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="stock" style="display: block; font-size: 0.875rem; font-weight: 700; margin-bottom: 0.5rem; color: #5a3e36;">Available Stock</label>
                        <input type="text" value="{{ $fooditem->stock }}" name="stock" id="stock"
                               style="width: 100%; padding: 0.5rem; border: 1px solid #d9d0c3; border-radius: 0.25rem; background-color: #fdf8f3; color: #333;">
                    </div>

                    <button type="submit" style="background-color: #9bbf63; color: #fff; font-weight: 700; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; cursor: pointer;">
                        Add
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
