<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post a job
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-6">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Post a new oppotunity!</h1>
          </div>
          @if(session('success_message'))
            <div class="alert alert-success mx-auto w-1/2 text-2xl text-center mb-4 bg-green-400 rounded-lg">
              {{ session('success_message')}}
          </div>
          @endif
          @if(session('error_message'))
          <div class="alert alert-danger">
            {{ session('error_message')}}
        </div>
        @endif
          <div class="lg:w-5/6 md:w-2/3 mx-auto">
            <form id="submit" method="POST" action="{{ route('company.post.job.store') }}">
                @csrf
            <div class="-m-2 lg:min-w-full md:w-2/3 rounded-lg bg-white">
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative mt-4">
                  <label for="title" class="leading-7 text-sm font-bold text-gray-600">Title</label>
                  <input type="text" id="title" name="title" minlength="10" maxlength="100" required value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  @error('title')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="suburb" class="leading-7 text-sm font-bold text-gray-600">Suburb</label>
                  {{-- <input type="text" id="suburb" name="suburb" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                  <select name="suburb" id="suburb" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select suburb</option>
                    @foreach ($suburbs as $suburb)
                        <option value="{{ $suburb->id }}" 
                          @if($suburb->id === (int)old('suburb')) selected @endif>
                            {{ $suburb->name }}
                        </option>
                    @endforeach
                  </select>
                  @error('suburb')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="sub_classification" class="leading-7 text-sm font-bold text-gray-600">Classification</label>
                  <select name="sub_classification" id="sub_classification" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select Classification</option>
                    @foreach ($classifications as $classification)
                    <optgroup label="{{ $classification->name }}">
                      @foreach ($classification->subClassification as $sub_classification)
                          <option value="{{ $sub_classification->id }}"
                            @if ($sub_classification->id === (int)old('sub_classification')) selected @endif>
                            {{ $sub_classification->name }} 
                          </option>
                      @endforeach
                    @endforeach
                  </select>
                  @error('sub_classification')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="annual_salary" class="leading-7 text-sm font-bold text-gray-600">Annual salary</label>
                  <input type="number" min="0" id="annual_salary" name="annual_salary" required value="{{ old('annual_salary') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="hourly_pay" class="leading-7 text-sm font-bold text-gray-600">Hourly pay</label>
                  <input type="number" min="0" id="hourly_pay" name="hourly_pay" required value="{{ old('hourly_pay') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  @error('hourly_pay')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <label for="hourly_pay" class="leading-7 text-sm font-bold text-gray-600">Job type</label>
                @error('job_type')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                <div class="relative items-center mb-4">
                  <ul class="w-96 text-xl font-medium text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($job_types as $job_type)
                      <li class="w-full my-2 dark:border-gray-600">
                        <div class="flex items-center pl-3">
                          <input name="job_type" id="job_type" type="radio" value="{{ $job_type->value }}" 
                          @if($job_type->value === (int)old('job_type')) checked @endif
                          class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                          <label for="job_type" class="leading-7 text-xl text-gray-600">{{ $job_type->label() }}</label>      
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="description" class="leading-7 text-sm font-bold text-gray-600">Description</label>
                  @error('description')
                    <div class="alert alert-danger text-red-500">{{ $message }}</div>
                  @enderror
                  <textarea id="description" name="description" minlength="100" maxlength="1000" rows="20" placeholder="Tell jobseekers your attractiveness!" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ old('description') }}</textarea>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="is_display" class="leading-7 text-sm text-gray-600">is display</label>
                  <select name="is_display" id="is_display">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="p-2 w-full">
                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Post a job</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </section>
</x-app-layout>