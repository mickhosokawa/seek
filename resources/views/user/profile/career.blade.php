<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register your career
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="mt-10 mx-auto">
            <div class="md:grid md:grid-cols-2 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Career Information</h3>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                    <form action="{{route('user.profile.career.store')}}" method="POST">
                        @csrf
                        <div  class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3" id="jobTitleTop">
                                <label for="jobTitle" id="jobTitle" class="block text-sm font-medium text-gray-700">Job title</label>
                                {{-- 未登録の場合 --}}
                                @if ($careers->isEmpty())
                                    <input type="text" name="jobTitle[]" autocomplete="JobTitle" class="jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                    <input type="button" onclick="addElements()" name="addJobTitle" value="add" class="addJobTitle cursor-pointer mt-3">
                                @else
                                    @foreach ($careers as $career)
                                    <input type="text" name="jobTitle[]" autocomplete="JobTitle" value={{ $career->job_title }} class="jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                    <input type="button" onclick="addElements()" name="addJobTitle" value="add" class="addJobTitle cursor-pointer mt-3">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
    function addElements(){

        // 追加する要素idを取得
        const targetClassName = event.target.className;

        var content = '';
        var inputItem = '';

        // 追加する要素の作成
        const inputType = document.createElement('input');

        // idを判別し、適切な要素を挿入する
        if(targetClassName.match('addJobTitle')){
            content = document.getElementById('jobTitle');
            inputType.type = "text";
            inputType.name = "jobTitle[]";
            inputType.className = "jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm";
        }

        // input要素を追加する
        content.appendChild(inputType);
    }
</script>