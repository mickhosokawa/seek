<x-navigation-and-search>
   
  {{-- 求人詳細表示 --}}
   <div class="bg-blue-100">
        <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
            <h1 class="mt-5 text-2xl font-bold">{{$detail->position}}</h1>
            <p class="mt-3 text-xl">{{$detail->role}}</p>
            <p class="mt-3 text-lg">{{$detail->location}}</p>
            <p class="text-lg">${{$detail->salary}} per hour</p>
            <p class="text-lg">{{$detail->categories}} > Administrative Assistants</p>
            <p class="text-gray-400 mt-3 mb-3">{{$detail->created_at}}</p>
            <a href="#" class="btn btn-primary bg-pink-500 rounded-md">Quick apply</a>
            <hr class="mt-5 border-t-2">
        </div>
    </div>
  </div>

</x-navigation-and-search>