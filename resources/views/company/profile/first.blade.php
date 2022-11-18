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
                          <input type="text" name="name" id="name" autocomplete="name" required 
                                    value="@if(isset($company->name)) 
                                    {{ $company->name }} 
                                    @else {{ old('name') }} 
                                    @endif "
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
          
                        <div class="col-span-6 sm:col-span-3">
                          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                          <input type="email" name="email" id="email" autocomplete="email" required 
                                    value="@if(isset($company->email)) 
                                    {{ $company->email }} 
                                    @else {{ old('email') }} 
                                    @endif "
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Resident address</label>
                            <input type="text" name="address" id="address" autocomplete="email" required 
                                    value="@if(isset($company->address)) 
                                    {{ $company->address }} 
                                    @else {{ old('address') }} 
                                    @endif "
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                            <input type="number" name="phone_number" id="phone_number" autocomplete="phone_number" required
                                    value="@if(isset($company->phone_number)) 
                                    {{ $company->phone_number }} 
                                    @else {{ old('phone_number') }} 
                                    @endif "
                            class="mt-1 block w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                            <input type="url" name="url" id="url" autocomplete="url" required 
                                    value="@if(isset($company->url)) 
                                    {{ $company->url }} 
                                    @else {{ old('url') }} 
                                    @endif "
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <input type="text" name="industry" id="industry" autocomplete="industry" required 
                                    value="@if(isset($company->industry)) 
                                    {{ $company->industry }} 
                                    @else {{ old('industry') }} 
                                    @endif "
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="speciality" class="block text-sm font-medium text-gray-700">Speciality</label>
                            <input type="text" name="speciality" id="speciality" autocomplete="speciality" required 
                                    value="@if(isset($company->specialities)) 
                                    {{ $company->specialities }} 
                                    @else {{ old('speciality') }} 
                                    @endif "
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-6">
                            <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                            <textarea rows="4" name="mission" id="mission" autocomplete="mission" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @if(isset($company->our_mission_statement)) 
                                    {{ $company->our_mission_statement }} 
                                    @else {{ old('mission') }} 
                                    @endif
                            </textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
                            <textarea rows="4" name="featured" id="featured" autocomplete="featured" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @if(isset($company->featured)) 
                                    {{ $company->featured }} 
                                    @else {{ old('featured') }} 
                                    @endif
                            </textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="other" class="block text-sm font-medium text-gray-700">Other</label>
                            <textarea rows="4" name="other" id="other" autocomplete="other" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @if(isset($company->other)) 
                                    {{ $company->other }} 
                                    @else {{ old('other') }} 
                                    @endif
                            </textarea>
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