<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register your information
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="mt-10 mx-auto">
            <div class="md:grid md:grid-cols-2 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    </div>
                </div>
              <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                <form id="next" action="{{ route('user.profile.store.personal') }}" method="POST">
                    @csrf
                    {{-- フラッシュメッセージ --}}
                    @if (session('flash_message'))
                        <div class="flash_message alert alert-success bg-green-300 text-center mb-5">
                            {{ session('flash_message') }}
                        </div> 
                    @endif
                  <div class="overflow-hidden shadow sm:rounded-md">
                    {{-- <div class="bg-white px-4 py-5 sm:p-6"> --}}
                        {{-- バリデーションエラーを表示する --}}
                        @if($errors->any())
                        <div class="alert alert-danger mb-10">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    {{-- </div> --}}
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="name" class="block text-sm font-medium text-gray-700">First name</label>
                          <x-form-first name="first_name" formValue="{{ $user->first_name }}" oldValue="{{ old('first_name') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Last name</label>
                            <x-form-first name="last_name" formValue="{{ $user->last_name }}" oldValue="{{ old('last_name') }}" />
                        </div>
        
                        <div class="col-span-6 sm:col-span-3">
                          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                          <x-form-first name="email" formValue="{{ $user->email }}" oldValue="{{ old('email') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Resident address</label>
                            <x-form-first name="address" formValue="{{ $user->address }}" oldValue="{{ old('address') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <x-form-first name="phone_number" formValue="{{ $user->phone_number }}" oldValue="{{ old('phone_number') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="url" class="block text-sm font-medium text-gray-700">Summary</label>
                            <x-form-first name="personal_summary" formValue="{{ $user->personal_summary }}" oldValue="{{ old('personal_summary') }}" />
                        </div>
                       </div> 

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="hidden" id="next" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </div>
                </form>
              </div>
            </div>
        </div>
    </section>
</x-app-layout>