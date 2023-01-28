{{-- <x-navigation-and-search> --}}


  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <script src="{{asset('js/saveJobs.js')}}"></script> --}}
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
          <nav>
            <div class="firstNavWrapper flex bg-blue-50">
              <div class="mx-auto">
                <span class="m-2">Jobs</span>
                <span class="m-2">Courses</span>
                <span class="m-2">Businesses for sale</span>
                <span class="m-2">Volunteering</span>
              </div>
            </div>
            {{-- <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button> --}}
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
              <ul class="flex flex-col content-center p-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                  <a href="localhost:8000/seek/index" class="flex items-center mt-7 ml-32">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                </li>
                <li>
                  <a href="" class="block py-2 pr-4 pl-3 mt-8 text-lg text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Job search</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 mt-8 text-lg text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 mt-8 text-lg text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Career advice</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 mt-8 text-lg text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Company reviews</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pr-4 pl-3 mt-8 ml-72 text-lg text-gray-700 rounded border-b-cyan-700 border-2 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign in</a>
                </li>
              </ul>
            </div>
          </div>
          </nav>
          {{-- 検索欄 --}}
<div class="flex flex-row justify-center w-full bg-blue-800">
  <form action="{{route('user.seek.index')}}" method="get">
    <div class="flex max-w-screen-md m-5 w-full">
      <div>
        <p class="text-white text-bold text-lg ml-5">What</p>
        <input class="border border-slate-300 rounded-md ml-5 mt-1" placeholder="Search for anything..." type="search" name="search" value=
          "@if (isset($search)) {{ $search }} @endif">
      </div>

      {{-- 職種選択 --}}
      <div class="mt-7">
        <select name="sub_classification" class="border rounded-md ml-5 mt-1" >
          <option value="0" @if(\Request::input('sub_classification') === "0") selected @endif>All</option>
          @foreach ($classifications as $classification)
          <optgroup label="{{ $classification->name }}">
            @foreach ($classification->subClassification as $sub_classification)
                <option value="{{ $sub_classification->id }}" @if(\Request::input('sub_classification') == $sub_classification->id) selected @endif>{{ $sub_classification->name }}</option>
            @endforeach
          </optgroup>
          @endforeach
        </select>
      </div>

      {{-- 場所指定 --}}
      <div>
          <p class="flex text-white text-bold text-lg ml-5">Where</p>
          <select name="suburb" class="border rounded-md ml-5 mt-1" >
            <option value="0" @if(\Request::input('suburb') === "0") selected @endif>All</option>
            @foreach ($suburbs as $suburb)
                  <option value="{{ $suburb->id }}" @if(\Request::input('suburb') == $suburb->id) selected @endif>{{ $suburb->name }}</option>
            @endforeach
          </select>
      </div>
      <input type="submit" class="ml-2 px-6 py-1 mt-9 rounded bg-pink-600 text-white font-bold link-hover cursor-pointer" value="SEEK" selected>
    </div>
  </form>
</div>

    {{-- 投稿一覧 --}}
    <div class="bg-gray-100 mt-3 justify-center">
      <div class="mt-5 ml-20">
        <select name="sort" id="sort">
          <option value="relevance" 
            @if (\Request::get('sort') === 'relevance')
                selected
                @endif>Relevance</option>
          <option value="date" 
            @if (\Request::get('sort') === 'date')
                selected
                @endif>Date</option>
        </select>
      </div>
      <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
        @if (isset($jobOffers))
          @foreach ($jobOffers as $job)
          <h3 class="mt-5">
            <a href="{{route('user.seek.show', ['id'=>$job->id]) }}" class="text-blue-600 text-2xl link-hover cursor-pointer" id="{{ 'target'.$job->id }}" data-id="{{$job->id}}">{{$job->title}}</a>
            <p class="mt-3">{{$job->suburb->name.' - '.$job->suburb->state->name}}</p>
            <p>{{'$'.$job->annual_salary}} per month</p>
            <p>{{'Role: '.$job->subClassification->name}}</p>
            <p class="text-gray-400 mt-3 mb-3">{{ $job->description }}</p>    
              <span class="">☆</span>
              <button class="like" name="{{ $job->id }}" data-job="{{ $job->id }}" >Save</button>
            </form>
            <hr class="mt-5 border-t-2">
        </h3>
          @endforeach
            <button class="flex justify-center text-white rounded-md">More...</p>
        @endif  
      </div>
    </div>

    
</div>
<script>
  const select = document.getElementById('sort')
  select.addEventListener('change', function(){
    this.form.submit()
  })
</script>
<script src="{{asset('js/saveJobs.js')}}"></script>
        </div>
    </body>
</html>
    

{{-- </x-navigation-and-search> --}}