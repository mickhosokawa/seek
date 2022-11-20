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
                    {{-- 受賞タイトル入力フォームの追加 --}}
                    <div class="col-span-6 sm:col-span-6">
                        <label for="awardTitle" class="leading-7 text-lg text-gray-600">Awards and accreditations</label>
                        <table class="mt-5">
                            <thead>
                                <tr class="">
                                    <th class="text-left">Award title</th>
                                    <th class="text-left">Atached Image</th>
                                </tr>
                            </thead>
                            @if ($awards)
                            @foreach ($awards as $award)                    
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="awardTitle[]" id="awardTitle" autocomplete="awardTitle" value="{{ $award->title }}" class="mt-1 block w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                        <td><input type="file" id="awardImage" name="awardImage[]" /></td>
                                    </tr>
                                </tbody>    
                            @endforeach
                            @endif

                            <tbody id="award">
                                <tr>
                                    <td><input type="text" name="awardTitle[]" id="awardTitle" autocomplete="awardTitle" value="{{ old('awardTitle') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                    <td><input type="file" id="awardImage" name="awardImage[]" class="" /></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input id="addAward" type="button" onclick="addElements()" value="add" class="addAwards mt-5 border-t-2"></td>
                                    {{-- <td><input type="button" onclick="deleteAwardsForm()" value="delete" class="addAwards mt-5 border-t-2"></td> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                
                    {{-- 文化と価値入力フォームの追加 --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label for="cultureTitle" class="leading-7 text-lg text-gray-600">Culture and values</label>
                        <table class="mt-5">
                            <thead>
                                <tr class="">
                                    <th class="text-left">Culture title</th>
                                    <th class="text-left">Culture detail</th>
                                </tr>
                            </thead>
                            @if ($cultures)
                            @foreach ($cultures as $culture)                    
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="cultureTitle[]" id="cultureTitle" autocomplete="cultureTitle" value="{{ $culture->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                        <td><textarea id="cultureDetail" name="cultureDetail[]" autocomplete="cultureDetail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $culture->detail }}</textarea></td>
                                    </tr>
                                </tbody>    
                            @endforeach
                            @endif

                            <tbody id="culture">
                                <tr>
                                    <td><input type="text" name="cultureTitle[]" id="cultureTitle" autocomplete="cultureTitle" value="{{ old('cultureTitle') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                    <td><textarea id="cultureDetail" name="cultureDetail[]" autocomplete="cultureDetail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('cultureDetail') }}</textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input id="addCulture" type="button" onclick="addElements()" value="add" class="addAwards mt-5 border-t-2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{-- 福利厚生フォームを追加 --}}
                    <div class="col-span-6 sm:col-span-3">
                        <label for="benefitTitle" class="leading-7 text-lg text-gray-600">Benefits</label>
                        <table class="mt-5">
                            <thead>
                                <tr class="">
                                    <th class="text-left">Benefit title</th>
                                    <th class="text-left">Benefit detail</th>
                                </tr>
                            </thead>
                            @if ($benefits)
                            @foreach ($benefits as $benefit)                    
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="benefitTitle[]" id="benefitTitle" autocomplete="benefitTitle" value="{{ $benefit->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                        <td><textarea id="benefitDetail" name="benefitDetail[]" autocomplete="benefitDetail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $benefit->detail }}</textarea></td>
                                    </tr>
                                </tbody>    
                            @endforeach
                            @endif

                            <tbody id="benefit">
                                <tr>
                                    <td><input type="text" name="benefitTitle[]" id="benefitTitle" autocomplete="benefitTitle" value="{{ old('benefitTitle') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></td>
                                    <td><textarea id="benefitDetail" name="benefitDetail[]" autocomplete="benefitDetail" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('benefitDetail') }}</textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input id="addBenefit" type="button" onclick="addElements();" value="add" class="addAwards mt-5 border-t-2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <div class="p-2 w-full">
                    <button type="hidden" id="next" name="pageFlag" value="2" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Confirm</button>
                </div>
                </div>
            </form>
           </div>
        </div>
    </section>
</x-app-layout>

<script>

    // 各入力フォームの追加
    function addElements(){

        // 追加する要素idを取得
        var id = event.target.id;

        var content = '';
        var inputImage = '';

        // 追加する要素の作成
        var inputTitle = document.createElement('input');
        var textarea = document.createElement('textarea');
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var tr = document.createElement('tr');

        // idの判別
        if(id == 'addAward'){
            content = document.getElementById('award');
            inputTitle.id = 'awardTitle';
            inputTitle.type = 'text';
            inputTitle.name = 'awardTitle[]';
            inputTitle.className = 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';

            // <input>要素(画像)に属性を追加
            inputImage = document.createElement('input');
            inputImage.id = 'awardImage';
            inputImage.type = 'file';
            inputImage.name = 'awardImage[]';
            inputImage.className = "";
        }else if(id == 'addCulture'){
            content = document.getElementById('culture');
            inputTitle.id = 'cultureTitle';
            inputTitle.type = 'text';
            inputTitle.name = 'cultureTitle[]';
            inputTitle.className = 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';

            textarea.id = 'cultureDetail';
            textarea.name = 'cultureDetail[]';
            textarea.className = "mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm";
        }else{
            content = document.getElementById('benefit');
            inputTitle.id = 'benefitTitle';
            inputTitle.type = 'text';
            inputTitle.name = 'benefitTitle[]';
            inputTitle.className = 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm';

            textarea.id = 'benefitDetail';
            textarea.name = 'benefitDetail[]';
            textarea.className = "mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm";
        }

        // <input>要素を<td>に追加
        td1.appendChild(inputTitle);

        if(id == 'addAward'){
            td2.appendChild(inputImage);
        }else{
            td2.appendChild(textarea);
        }

        // <tr>要素をtdに追加
        tr.appendChild(td1);
        tr.appendChild(td2);

        content.appendChild(tr);
    }

</script>