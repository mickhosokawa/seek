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
                        <input type="text" id="name" name="name" value="{{ $key["name"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" value="{{ $key["email"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    {{-- 要改善 --}}
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="address" class="leading-7 text-sm text-gray-600">Address</label>
                        <input type="text" id="address" name="address" value="{{ $key["address"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="phone_number" class="leading-7 text-sm text-gray-600">Phone number</label>
                        <input type="number" id="phone_number" name="phone_number" value="{{ $key["phone_number"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="url" class="leading-7 text-sm text-gray-600">URL</label>
                        <input type="text" id="url" name="url" value="{{ $key["url"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="industry" class="leading-7 text-sm text-gray-600">Industry</label>
                        <input type="text" id="industy" name="industry" value="{{ $key["industry"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="company_size" class="leading-7 text-sm text-gray-600">Company size</label>
                        <input type="text" id="company_size" name="company_size" value="{{ $key["company_size"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="speciality" class="leading-7 text-sm text-gray-600">speciality</label>
                        <input type="text" id="speciality" name="speciality" value="{{ $key["speciality"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="mission" class="leading-7 text-sm text-gray-600">Mission</label>
                        <input type="text" id="mission" name="mission" value="{{ $key["mission"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="featured" class="leading-7 text-sm text-gray-600">Featured</label>
                        <input type="text" id="featured" name="featured" value="{{ $key["featured"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                        <label for="other" class="leading-7 text-sm text-gray-600">Other</label>
                        <input type="text" id="other" name="other" value="{{ $key["other"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    {{-- 以下companiesテーブル以外の更新 --}}
                    {{-- 配列で受け取っているのでエラーが出ていた問題を修正 --}}
                    @if (isset($exceptImageFile))
                        @foreach ($exceptImageFile['awardTitle'] as $imageFile)
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative" id="awardsBaseForm">
                            <label for="awardTitle" class="leading-7 text-sm text-gray-600">Awards and Accreditations</label>
                            <input type="text" id="awardTitle" name="awardTitle" value="{{ $imageFile }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @endforeach
                    @endif

                    {{-- 文化と価値タイトル --}}
                    @if(isset($exceptImageFile['cultureTitle']))
                        @foreach ($exceptImageFile['cultureTitle'] as $cultureTitle)
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                            <label for="cultureTitle" class="leading-7 text-sm text-gray-600">Culture and values</label>
                            <input type="text" id="cultureTitle" name="cultureTitle" value="{{ $cultureTitle }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @endforeach
                    @endif

                    {{-- 文化と価値詳細 --}}
                    @if(isset($exceptImageFile['cultureDetail']))
                        @foreach ($exceptImageFile['cultureDetail'] as $cultureDetail)
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                            <label for="cultureDetail" class="leading-7 text-sm text-gray-600">Culture and values</label>
                            <input type="text" id="cultureDetail" name="cultureDetail" value="{{ $cultureDetail }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @endforeach
                    @endif

                    {{-- 福利厚生タイトル --}}
                    @if (isset($exceptImageFile['benefitTitle']))
                        @foreach ($exceptImageFile['benefitTitle'] as $benefitTitle)
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                            <label for="benefitTitle" class="leading-7 text-sm text-gray-600">Benefits</label>
                            <input type="text" id="benefitTitle" name="benefitTitle" value="{{ $benefitTitle }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @endforeach
                    @endif

                    {{-- 福利厚生詳細 --}}
                    @if (isset($exceptImageFile['benefitDetail']))
                        @foreach ($exceptImageFile['benefitDetail'] as $benefitDetail)
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                            <label for="benefitDetail" class="leading-7 text-sm text-gray-600">Benefits</label>
                            <input type="text" id="benefitDetail" name="benefitDetail" value="{{ $benefitDetail }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        @endforeach
                    @endif
                
                {{-- <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="images" class="leading-7 text-sm text-gray-600">Images</label>
                    <input type="text" id="images" name="images" value="{{ $exceptImageFile["images"] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div> --}}
                <div class="p-2 w-full">
                    <button type="hidden" id="next" name="pageFlag" value="2" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Next2</button>
                </div>
                </div>
            </form>
           </div>
        </div>
    </section>
</x-app-layout>