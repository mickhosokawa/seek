<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit your career
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit your career</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
          </div>
          <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
            <form method="POST" action="{{route('user.profile.career.update', ['id' =>$career->id])}}">
                @csrf
                <div class="grid grid-cols-6 gap-6" id="job_role">
                    <div class="col-span-6">
                        <label for="job_title" class="block text-sm font-medium text-gray-700">Job title</label>
                        <input type="text" name="job_title" autocomplete="job_title" value="{{ $career->job_title }}" class="jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                    <div class="col-span-6">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company name</label>
                        <input type="text" name="company_name" value="{{ $career->job_title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    </div>
                    <div class="err-msg col-span-2 sm:col-span-2">
                        <label for="start_year" class="block text-sm font-medium text-gray-700">Started year</label>
                        <select name="started_year" id="started_year" data-started_year={{ old('started_year') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @for ($i=$current_year-50; $i<=$current_year; $i++)
                            <option @if($career->started_year === $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-2 ">
                        <label for="start_month" class="block text-sm font-medium text-gray-700">Started month</label>
                        <select name="started_month" id="started_month" data-started_month={{ old('started_month') }} required class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @for ($i=1; $i<=12; $i++)
                                <option @if($career->started_month === $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>    
                    </div>
                    <div class="col-end-6"></div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="ended_year" class="block text-sm font-medium text-gray-700">Ened year</label>
                        <select name="ended_year" id="ended_year" data-ended_year={{ old('ended_year') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @for ($i=$current_year-50; $i<=$current_year; $i++)
                            <option @if($career->ended_year === $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                    </div>
                    <div class="col-span-2 sm:col-span-2">
                        <label for="ended_month" class="block text-sm font-medium text-gray-700">Ended month</label>
                        <select name="ended_month" id="ended_month" data-ended_month={{ old('ended_month') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @for ($i=1; $i<=12; $i++)
                                <option @if($career->ended_month === $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>    
                    </div>
                    <div class="col-end-6 text-sm">
                        <input type="checkbox" id="still_in_role" onclick="disableEnded()">
                        <label for="still_in_role">Still in role</label>
                    </div>
                    <div class="col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea class="w-full" name="description" id="description" cols="30" rows="10" placeholder="Summarise your responsibilities, skills and achievements."></textarea>
                    </div>
                    <div class="flex col-span-6 justify-between px-4 py-3 sm:px-6">
                        <button type="button" class="modal__btn bg-pink-400 rounded-md text-white" data-micromodal-close aria-label="Close this dialog window">Close</button>
                        <button type="submit" id="save" class="inline-flex rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
      </section>

</x-app-layout>