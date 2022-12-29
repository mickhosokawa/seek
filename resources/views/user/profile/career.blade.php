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
                <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                        <header class="modal__header">
                          <h2 class="modal__title" id="modal-1-title">
                            Micromodal
                          </h2>
                          <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                          <p>
                            Try hitting the <code>tab</code> key and notice how the focus stays within the modal itself. Also, <code>esc</code> to close modal.
                          </p>
                        </main>
                        <footer class="modal__footer">
                          <button type="button" class="modal__btn modal__btn-primary">Continue</button>
                          <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
                        </footer>
                      </div>
                    </div>
                  </div>
                  <a data-micromodal-trigger="modal-1" href='javascript:;'>Open Modal Dialog</a>

                <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                    <form action="{{route('user.profile.career.store')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                        <label for="jobRole" id="addRole" class="block text-sm font-medium text-gray-700">Role</label>
                            <div class="col-span-6">
                                <label for="jobTitle" id="jobTitle" class="block text-sm font-medium text-gray-700">Job title</label>
                                <input type="text" name="jobTitle" autocomplete="JobTitle" class="jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                <input type="button" onclick="addElements()" name="addJobTitle" value="add" class="addJobTitle cursor-pointer mt-3">
                            </div>
                            <div class="col-span-6">
                                <label for="companyName" id="companyName" class="block text-sm font-medium text-gray-700">Company name</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="start_year" class="block text-sm font-medium text-gray-700">Started year</label>
                                <select type="date" id="start_year" class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @for ($i=1900; $i<=2022; $i++)
                                    <option value={{ $i }}>{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-span-2 sm:col-span-2 ">
                                <label for="start_month" class="block text-sm font-medium text-gray-700">Started month</label>
                                <select type="date" id="start_month" class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @for ($i=1; $i<=12; $i++)
                                        <option value={{ $i }}>{{$i}}</option>
                                    @endfor
                                </select>    
                            </div>
                            <div class="col-end-6"></div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="end_year" class="block text-sm font-medium text-gray-700">Ened year</label>
                                <select type="date" id="ended_year" class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @for ($i=1900; $i<=2022; $i++)
                                    <option value={{ $i }}>{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="ended_month" class="block text-sm font-medium text-gray-700">Ended month</label>
                                <select type="date" id="ended_month" class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @for ($i=1; $i<=12; $i++)
                                        <option value={{ $i }}>{{$i}}</option>
                                    @endfor
                                </select>    
                            </div>
                            <div class="col-end-6">
                                <input type="checkbox" id="still_in_role" onclick="disableEnded()">
                                <label for="still_in_role">Still in role</label>
                            </div>
                            <div class="col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea class="w-full" name="" id="" cols="30" rows="10" placeholder="Summarise your responsibilities, skills and achievements."></textarea>
                            </div>
                            <div class="col-span-6 bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="hidden" id="next" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Next</button>
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

    // Still in roleにチェックがある場合はEndedを非活性にする
    function disableEnded(){
        const stillInRole = document.getElementById('still_in_role');
        let endYear = document.getElementById('ended_year');
        let endMonth = document.getElementById('ended_month');

        if(stillInRole.checked){
            endYear.disabled = true;
            endMonth.disabled = true;
        }else{
            endYear.disabled = false;
            endMonth.disabled = false;
        }
    }
</script>