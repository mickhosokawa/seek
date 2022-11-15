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
            <form id="next" method="POST" action="{{ route('company.profile.second') }}">
                @csrf
                <div class="-m-2">
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative" id="awardsBaseForm">
                    <label for="AwardsAndAccreditations" class="leading-7 text-sm text-gray-600">Awards and Accreditations</label>
                    <input type="text" id="AwardsAndAccreditations" name="AwardsAndAccreditations" value="{{ old('AwardsAndAccreditations') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="cultureAndValues" class="leading-7 text-sm text-gray-600">Culture and values</label>
                    <input type="text" id="cultureAndValues" name="cultureAndValues" value="{{ old('cultureAndValues') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="benefits" class="leading-7 text-sm text-gray-600">Benefits</label>
                    <input type="text" id="benefits" name="benefits" value="{{ old('benefits') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                    <label for="images" class="leading-7 text-sm text-gray-600">Images</label>
                    <input type="text" id="images" name="images" value="{{ old('images') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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

<script>

    // 受賞タイトルを追加した時
    function addAwardsForm(){ 
        var input_data = document.createElement('input');
        input_data.id = 'AwardsAndAccreditations';
        input_data.type = 'text';
        input_data.name = 'AwardsAndAccreditations';
        input_data.class = 'w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out';
        //document.getElementByClassName('addAwards');

        var parent = document.getElementById('awardsBaseForm');
        parent.appendChild(input_data);
    }
    
    // 福利厚生を追加した時
    function addBenefitForm(){
        document.getElementByClassName('');
    }
    
    // 文化と価値を追加した時    
    function addCultureForm(){
        document.getElementByClassName('');
    }

    // 写真を追加した時
    function addImageForm(){
        document.getElementByClassName('');
    }

</script>