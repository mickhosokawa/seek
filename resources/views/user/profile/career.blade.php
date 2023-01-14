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
                            Add role
                          </h2>
                          <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                            @error('job_title')
                                <div class="alert alert-danger" id="test1" data-test="{{ $message }}">{{ $message }}</div>
                            @enderror
                            @error('company_name')
                                <div class="alert alert-danger" id="test2" data-name="{{ $message }}">{{ $message }}</div>
                            @enderror
                            @error('started_career_date')
                                <div class="alert alert-danger" id="test3" data-test="{{ $message }}">{{ $message }}</div>
                            @enderror
                            @error('ended_career_date')
                                <div class="alert alert-danger" id="test4" data-name="{{ $message }}">{{ $message }}</div>
                            @enderror
                            <div class="mt-5 md:col-span-2 w-2/3 md:mt-0 mx-auto">
                                <form action="{{route('user.profile.career.store')}}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-6" id="job_role">
                                        <div class="col-span-6">
                                            <label for="job_title" class="block text-sm font-medium text-gray-700">Job title</label>
                                            <input type="text" name="job_title" autocomplete="job_title" value="{{ old('job_title') }}" class="jobTitle mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                                        </div>
                                        <div class="col-span-6">
                                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company name</label>
                                            <input type="text" name="company_name" value="{{ old('company_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        </div>
                                        <div class="err-msg col-span-2 sm:col-span-2">
                                            <label for="start_year" class="block text-sm font-medium text-gray-700">Started year</label>
                                            <select name="started_year" id="started_year" data-started_year={{ old('started_year') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @for ($i=$current_year-50; $i<=$current_year; $i++)
                                                <option @if($i === (int)old('started_year')) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-2 ">
                                            <label for="start_month" class="block text-sm font-medium text-gray-700">Started month</label>
                                            <select name="started_month" id="started_month" data-started_month={{ old('started_month') }} required class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @for ($i=1; $i<=12; $i++)
                                                    <option @if($i === (int)old('started_month')) selected @endif>{{$i}}</option>
                                                @endfor
                                            </select>    
                                        </div>
                                        <div class="col-end-6"></div>
                                        <div class="col-span-2 sm:col-span-2">
                                            <label for="ended_year" class="block text-sm font-medium text-gray-700">Ened year</label>
                                            <select name="ended_year" id="ended_year" data-ended_year={{ old('ended_year') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            @for ($i=$current_year-50; $i<=$current_year; $i++)
                                                <option @if($i === (int)old('ended_year')) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                        </div>
                                        <div class="col-span-2 sm:col-span-2">
                                            <label for="ended_month" class="block text-sm font-medium text-gray-700">Ended month</label>
                                            <select name="ended_month" id="ended_month" data-ended_month={{ old('ended_month') }} class="col-span-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                @for ($i=1; $i<=12; $i++)
                                                    <option @if($i === (int)old('ended_year')) selected @endif>{{$i}}</option>
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
                        </main>
                      </div>
                    </div>
                  </div>
                  <a data-micromodal-trigger="modal-1" href='javascript:;'>Add your role so far</a>
                  {{-- 追加した職歴を表示する --}}
                  <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Job title</th>
                                <th>Company name</th>
                                <th>Started</th>
                                <th>Ended</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                            <tr>
                                    <td>{{ $career->job_title }}</td>
                                    <td>{{ $career->company_name }}</td>
                                    <td>{{ $career->started_year.'/'.$career->started_month }}</td>
                                    <td>{{ $career->ended_year.'/'.$career->ended_month }}</td>
                                    <td><a href="{{ route('user.profile.edit', ['id'=>$career->id]) }}" onclick="openCareerEditModal()" >Edit</a></td>
                                    {{--<td><a href="#"{{ /*route('user.profile.career.edit', ['id'=>$career->id])*/ }}>Delete</a></td> --}}
                                
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </section>
</x-app-layout>