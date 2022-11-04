<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post a job
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Post a new job!</h1>
            {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter name, email, pass</p> --}}
          </div>
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form id="submit" method="POST" action="{{ route('company.post.job.store') }}">
                @csrf
            <div class="-m-2">
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                  <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="suburb" class="leading-7 text-sm text-gray-600">Suburb</label>
                  <input type="text" id="suburb" name="suburb" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="classification" class="leading-7 text-sm text-gray-600">Classification</label>
                  {{-- <input type="text" list="classification"> --}}
                  {{-- <datalist id="classification" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                  <select name="classification" id="classification" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select Classification</option>
                    @foreach ($classifications as $classification)
                    <optgroup label="{{ $classification->name }}">
                      @foreach ($classification->subClassification as $sub_classification)
                          <option value="{{ $sub_classification->id }}">{{ $sub_classification->name }} </option>
                      @endforeach
                        {{-- <option value="{{ $classification->id }}">{{ $classification->name }}</option> --}}
                    @endforeach
                  </select>
                </div>
              </div>
              {{-- <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="sub_classification" class="leading-7 text-sm text-gray-600">Sub classification</label>
                  <select name="sub_classification" id="sub_classification"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select Sub-Classification</option>
                    @foreach ($sub_classifications as $sub_classification)
                        <option value="{{ $sub_classification->id }}">{{ $sub_classification->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div> --}}
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="annual_salary" class="leading-7 text-sm text-gray-600">Annual salary</label>
                  <input type="text" id="annual_salary" name="annual_salary" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="hourly_pay" class="leading-7 text-sm text-gray-600">Hourly pay</label>
                  <input type="text" id="hourly_pay" name="hourly_pay" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="job_type" class="leading-7 text-sm text-gray-600">Job type</label>
                  <select name="job_type" id="job_type"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="">Select job type</option>
                    @foreach ($job_types as $job_type)
                        <option value="{{ $job_type->value }}">{{ $job_type->label() }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="p-2 w-1/2 mx-auto">
                <div class="relative">
                  <label for="description" class="leading-7 text-sm text-gray-600">Description</label>
                  <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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