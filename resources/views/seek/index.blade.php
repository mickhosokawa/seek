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
    </head>
    <body>
        <div class="flex bg-blue-200">
            <span class="font-bold m-2">Jobs</span>
            <span class="font-bold m-2">Courses</span>
            <span class="font-bold m-2">Businesses for sale</span>
            <span class="font-bold m-2">Volunteering</span>
        </div>

        <a href="localhost:8000/seek/index" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
            </li>
            <li>
              <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
            </li>
            <li>
              <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
            </li>
            <li>
              <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- 検索 --}}
  <div class="flex flex-row bg-blue-800">
    <form action="{{route('jobs')}}" method="get">
        <div class="flex justify-center max-w-screen-md m-5 w-11/12">
            <div>
                <p class="text-white text-bold text-lg ml-5">What</p>
                <input class="border rounded-md ml-5 mt-1" placeholder="Enter Keywords" type="search" name="search" value=
                  "@if (isset($search)) {{ $search }} @endif">
            </div>
            <div class="mt-7">
                <select name="categories" class="border rounded-md ml-5 mt-1" >
                  <option value="">all</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{$id}}">
                                  {{$name}}
                                </option>
                            @endforeach
                  </select>
            </div>
            <div>
                <p class="flex text-white text-bold text-lg ml-5">Where</p>
                <input class="border rounded-md ml-5 mt-1" type="text" name="location">
            </div>
            <input type="submit" class="ml-2 px-6 py-1 mt-9 rounded bg-pink-600 text-white font-bold link-hover cursor-pointer" value="SEEK" selected>
        </div>
  </div>

    {{-- 投稿一覧 --}}
    <div class="bg-gray-100 mt-3">
      <div class="mt-5 mb-5 border-none ">
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
        </form>
      </div>
    </div>
  
  <script>
    const select = document.getElementById('sort')
    select.addEventListener('change', function(){
      this.form.submit()
    })
  </script>
    </body>
</html>