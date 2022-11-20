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
                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                    </div>
                </div>
              <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                <form id="next" action="{{ route('company.profile.first') }}" method="POST">
                    @csrf
                  <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                          <x-form-first name="name" formValue="{{ $company->name }}" oldValue="{{ old('name') }}" />
                        </div>
        
                        <div class="col-span-6 sm:col-span-3">
                          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                          <x-form-first name="email" formValue="{{ $company->email }}" oldValue="{{ old('email') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Resident address</label>
                            <x-form-first name="address" formValue="{{ $company->address }}" oldValue="{{ old('address') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <x-form-first name="phone_number" formValue="{{ $company->phone_number }}" oldValue="{{ old('phone_number') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                            <x-form-first name="url" formValue="{{ $company->url }}" oldValue="{{ old('url') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="company_size" class="block text-sm font-medium text-gray-700">Company size</label>
                            <x-form-first name="company_size" formValue="{{ $company->company_size }}" oldValue="{{ old('company_size') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <x-form-first name="industry" formValue="{{ $company->industry }}" oldValue="{{ old('industry') }}" />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="speciality" class="block text-sm font-medium text-gray-700">Speciality</label>
                            <x-form-first name="speciality" formValue="{{ $company->specialities }}" oldValue="{{ old('speciality') }}" />
                        </div>

                        <div class="col-span-6">
                            <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                            <textarea rows="4" name="mission" id="mission" autocomplete="mission" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">@if(isset($company->our_mission_statement)){{ $company->our_mission_statement }}@else{{ old('mission') }}@endif</textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
                            <textarea rows="4" name="featured" id="featured" autocomplete="featured" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">@if(isset($company->featured)){{ $company->featured }}@else{{ old('featured') }}@endif</textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="other" class="block text-sm font-medium text-gray-700">Other</label>
                            <textarea rows="4" name="other" id="other" autocomplete="other" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">@if(isset($company->other)){{ $company->other }}@else{{ old('other') }}@endif</textarea>
                        </div>
                    </div> 

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="hidden" id="next" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Next</button>
                        </div>
                    </div>
                </div>
                </form>
              </div>
            </div>
        </div>
    </section>
</x-app-layout>