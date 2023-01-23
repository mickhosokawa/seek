<x-navigation-and-search>
   
  {{-- 求人詳細表示 --}}
   <div class="bg-blue-100">
        <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
            <h1 class="mt-5 text-2xl font-bold">{{$detail->title}}</h1>
            <p class="mt-3 text-xl">{{$detail->suburb->name.': '. $detail->suburb->state->name}}</p>
            <p class="mt-3 text-lg">{{$detail->annual_salary}}</p>
            <p class="text-lg">${{$detail->hourly_pay}} per hour</p>
            <p class="text-lg">{{$detail->subClassification->name}}</p>
            <p class="text-lg mt-5">{{$detail->description}}</p>
            <p class="text-gray-400 mt-3 mb-3">{{$detail->created_at}}</p>
            <a href="#" class="btn btn-primary bg-pink-500 rounded-md">Quick apply</a>
            <hr class="mt-5 border-t-2">
        </div>
    </div>
  </div>

</x-navigation-and-search>