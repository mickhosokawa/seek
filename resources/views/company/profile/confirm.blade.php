<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register your information
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"></h1>
          </div>
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form id="next" method="POST" action="{{ route('company.profile.store') }}">
                @csrf
                <div class="-m-2">
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" value="{{ $input['name'] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" value="{{ $input["email"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    {{-- 要改善 --}}
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="address" class="leading-7 text-sm text-gray-600">Address</label>
                        <input type="text" id="address" name="address" value="{{ $input["address"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="phone_number" class="leading-7 text-sm text-gray-600">Phone number</label>
                        <input type="number" id="phone_number" name="phone_number" value="{{ $input["phone_number"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="url" class="leading-7 text-sm text-gray-600">URL</label>
                        <input type="text" id="url" name="url" value="{{ $input["url"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="industry" class="leading-7 text-sm text-gray-600">Industry</label>
                        <input type="text" id="industy" name="industry" value="{{ $input["industry"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="company_size" class="leading-7 text-sm text-gray-600">Company size</label>
                        <input type="text" id="company_size" name="company_size" value="{{ $input["company_size"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="speciality" class="leading-7 text-sm text-gray-600">speciality</label>
                        <input type="text" id="speciality" name="speciality" value="{{ $input["speciality"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="mission" class="leading-7 text-sm text-gray-600">Mission</label>
                        <input type="text" id="mission" name="mission" value="{{ $input["mission"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="featured" class="leading-7 text-sm text-gray-600">Featured</label>
                        <input type="text" id="featured" name="featured" value="{{ $input["featured"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="other" class="leading-7 text-sm text-gray-600">Other</label>
                        <input type="text" id="other" name="other" value="{{ $input["other"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative" id="awardsBaseForm">
                    <label for="AwardsAndAccreditations" class="leading-7 text-sm text-gray-600">Awards and Accreditations</label>
                    <input type="text" id="AwardsAndAccreditations" name="AwardsAndAccreditations" value="{{ $input2["AwardsAndAccreditations"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="cultureAndValues" class="leading-7 text-sm text-gray-600">Culture and values</label>
                    <input type="text" id="cultureAndValues" name="cultureAndValues" value="{{ $input2["cultureAndValues"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="benefits" class="leading-7 text-sm text-gray-600">Benefits</label>
                    <input type="text" id="benefits" name="benefits" value="{{ $input2["benefits"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="images" class="leading-7 text-sm text-gray-600">Images</label>
                    <input type="text" id="images" name="images" value="{{ $input2["images"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button type="hidden" id="next" name="pageFlag" value="2" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Next2</button>
                </div>
                </div>
            </form>
           </div>
        </div>
    </section>
</x-app-layout>