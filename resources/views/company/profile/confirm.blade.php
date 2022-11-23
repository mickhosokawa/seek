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
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Check your personal detail</h3>
                    </div>
                </div>
                
                <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                    <form id="next" method="POST" action="{{ route('company.profile.store') }}">
                        @csrf
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $key["name"] }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" value="{{ $key["email"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                {{-- 要改善 --}}
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" id="address" name="address" value="{{ $key["address"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone number</label>
                                    <input type="number" id="phone_number" name="phone_number" value="{{ $key["phone_number"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                                    <input type="text" id="url" name="url" value="{{ $key["url"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                                    <input type="text" id="industy" name="industry" value="{{ $key["industry"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="company_size" class="block text-sm font-medium text-gray-700">Company size</label>
                                    <input type="text" id="company_size" name="company_size" value="{{ $key["company_size"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="speciality" class="block text-sm font-medium text-gray-700">speciality</label>
                                    <input type="text" id="speciality" name="speciality" value="{{ $key["speciality"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6">
                                    <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                                    <input type="text" id="mission" name="mission" value="{{ $key["mission"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6">
                                    <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
                                    <input type="text" id="featured" name="featured" value="{{ $key["featured"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="col-span-6">
                                    <label for="other" class="block text-sm font-medium text-gray-700">Other</label>
                                    <input type="text" id="other" name="other" value="{{ $key["other"] }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                {{-- 以下companiesテーブル以外の更新 --}}
                                {{-- 配列で受け取っているのでエラーが出ていた問題を修正 --}}
                                @if (isset($exceptImageFile))
                                    @foreach ($exceptImageFile['awardTitle'] as $imageFile)
                                    <div class="col-span-6">
                                        <div class="relative" id="awardsBaseForm">
                                        <label for="awardTitle" class="block text-sm font-medium text-gray-700">Award title</label>
                                        <input type="text" id="awardTitle" name="awardTitle" value="{{ $imageFile }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
            
                                {{-- 文化と価値タイトル --}}
                                @if(isset($exceptImageFile['cultureTitle']))
                                    @foreach ($exceptImageFile['cultureTitle'] as $cultureTitle)
                                    <div class="col-span-6">
                                        <div class="relative">
                                        <label for="cultureTitle" class="block text-sm font-medium text-gray-700">Culture title</label>
                                        <input type="text" id="cultureTitle" name="cultureTitle" value="{{ $cultureTitle }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
            
                                {{-- 文化と価値詳細 --}}
                                @if(isset($exceptImageFile['cultureDetail']))
                                    @foreach ($exceptImageFile['cultureDetail'] as $cultureDetail)
                                    <div class="col-span-6">
                                        <div class="relative">
                                        <label for="cultureDetail" class="block text-sm font-medium text-gray-700">Culture detail</label>
                                        <input type="text" id="cultureDetail" name="cultureDetail" value="{{ $cultureDetail }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
            
                                {{-- 福利厚生タイトル --}}
                                @if (isset($exceptImageFile['benefitTitle']))
                                    @foreach ($exceptImageFile['benefitTitle'] as $benefitTitle)
                                    <div class="col-span-6">
                                        <div class="relative">
                                        <label for="benefitTitle" class="block text-sm font-medium text-gray-700">Benefit title</label>
                                        <input type="text" id="benefitTitle" name="benefitTitle" value="{{ $benefitTitle }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
            
                                {{-- 福利厚生詳細 --}}
                                @if (isset($exceptImageFile['benefitDetail']))
                                    @foreach ($exceptImageFile['benefitDetail'] as $benefitDetail)
                                    <div class="col-span-6">
                                        <div class="relative">
                                        <label for="benefitDetail" class="block text-sm font-medium text-gray-700">Benefit detail</label>
                                        <input type="text" id="benefitDetail" name="benefitDetail" value="{{ $benefitDetail }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="hidden" id="next" name="pageFlag" value="2" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>