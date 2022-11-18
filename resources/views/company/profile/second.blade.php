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
            <form id="next" method="POST" action="{{ route('company.profile.second') }}" enctype="multipart/form-data">
                @csrf
                <div class="-m-2">
                {{-- 受賞タイトル名と画像を入力 --}}
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative" id="awardsBaseForm">
                        <label for="awardTitle" class="leading-7 text-sm text-gray-600">Awards and Accreditations</label>
                        <input type="text" id="awardTitle" name="awardTitle[]" value="{{ old('awardTitle') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <input type="file" id="awardImage" name="awardImage[]" />
                    </div>
                    <input type="button" onclick="addAwardsForm()" value="add" class="addAwards mt-5 border-t-2">
                </div>
                {{-- 文化と価値タイトルと詳細を入力 --}}
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative" id="cultureBaseForm">
                    <label for="cultureTitle" class="leading-7 text-sm text-gray-600">Culture and values</label>
                    <input type="text" id="cultureTitle" name="cultureTitle[]" value="{{ old('cultureTitle') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <input type="text" id="cultureDetail" name="cultureDetail[]" value="{{ old('cultureDetail') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <input type="button" onclick="addCultureForm()" value="add" class="addAwards mt-5 border-t-2">
                </div>
                {{-- 福利厚生タイトルと詳細を入力 --}}
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative" id="benefitBaseForm">
                        <label for="benefitTitle" class="leading-7 text-sm text-gray-600">Benefits</label>
                        <input type="text" id="benefitTitle" name="benefitTitle[]" value="{{ old('benefitTitle') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <input type="text" id="benefitDetail" name="benefitDetail[]" value="{{ old('benefitDetail') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <input type="button" onclick="addBenefitForm()" value="add" class="addAwards mt-5 border-t-2">
                </div>
                {{-- <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="images" class="leading-7 text-sm text-gray-600">Images</label>
                    <input type="text" id="images" name="images" value="{{ old('images') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <input type="button" onclick="addImageTitle()" value="add" class="addAwards mt-5 border-t-2">
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

<script>

    // 受賞タイトルを追加した時
    function addAwardsForm(){ 
        var input_title = document.createElement('input');
        input_title.id = 'awardTitle';
        input_title.type = 'text';
        input_title.name = 'awardTitle[]';
        input_title.class = 'w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out';
        
        var parent = document.getElementById('awardsBaseForm');
        parent.appendChild(input_title);

        var input_image = document.createElement('input');
        input_image.id = 'awardImage';
        input_image.type = 'file';
        input_image.name = 'awardImage[]';
        input_image.class = ''

        var parent = document.getElementById('awardsBaseForm');
        parent.appendChild(input_image);
    }

    // 文化と価値を追加した時    
    function addCultureForm(){
        var input_title = document.createElement('input');
        input_title.id = 'cultureTitle';
        input_title.type = 'text';
        input_title.name = 'cultureTitle[]';
        input_title.class = 'w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out';
        
        var parent = document.getElementById('cultureBaseForm');
        parent.appendChild(input_title);

        var input_image = document.createElement('input');
        input_image.id = 'cultureDetail';
        input_image.type = 'text';
        input_image.name = 'cultureDetail[]';
        input_image.class = ''

        var parent = document.getElementById('cultureBaseForm');
        parent.appendChild(input_image);
    }
    
    // 福利厚生を追加した時
    function addBenefitForm(){
        var input_title = document.createElement('input');
        input_title.id = 'benefitTitle';
        input_title.type = 'text';
        input_title.name = 'benefitTitle[]';
        input_title.class = 'w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out';
        
        var parent = document.getElementById('benefitBaseForm');
        parent.appendChild(input_title);

        var input_image = document.createElement('input');
        input_image.id = 'benefitDetail';
        input_image.type = 'text';
        input_image.name = 'benefitDetail[]';
        input_image.class = ''

        var parent = document.getElementById('benefitBaseForm');
        parent.appendChild(input_image);
    }

    // 写真を追加した時
    function addImageForm(){
        document.getElementByClassName('');
    }

</script>