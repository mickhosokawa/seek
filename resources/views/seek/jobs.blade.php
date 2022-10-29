<x-navigation-and-search>

  {{-- 検索 --}}
<div class="flex flex-row bg-blue-800">
  <form action="{{route('user.seek.list')}}" method="get">
    <div class="flex justify-center max-w-screen-md m-5 w-11/12">
      <div>
          <p class="text-white text-bold text-lg ml-5">What</p>
          <input class="border rounded-md ml-5 mt-1" placeholder="Enter Keywords" type="search" name="search" value=
            "@if (isset($search)) {{ $search }} @endif">
      </div>
      <div class="mt-7">
        <select name="category_ids" class="border rounded-md ml-5 mt-1" value="{{$category_ids}}">
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
    <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
      @if (isset($jobs))
        @foreach ($jobs as $job)
        <h3 class="mt-5">
          <a href="{{route('user.seek.show', ['id'=>$job->id]) }}" class="text-blue-600 text-2xl link-hover cursor-pointer">{{$job->position}}</a>
          <p class="text-xl">{{$job->role}}</p>
          <p class="mt-3">{{$job->location}}</p>
          <p>{{$job->salary}} per hour</p>
          {{-- <p>{{$job->job_id->name}} > Administrative Assistants</p> --}}
          <p class="text-gray-400 mt-3 mb-3">Employment Type: Temporary Full Time (up to 09/06/2023) Position Classification: Administration Officer Level 4 Remuneration: $33.45 - $34.26 per</p>
          <span class="">☆</span>
          <span class="text-blue-600 text-xl link-hover cursor-pointer">Save</span>
          <hr class="mt-5 border-t-2">
      </h3>
        @endforeach
          <button class="flex justify-center text-white rounded-md">More...</p>
      @endif  
    </div>
  </div>
  
  <script>
    const select = document.getElementById('sort')
    select.addEventListener('change', function(){
      this.form.submit()
    })
  </script>
</x-navigation-and-search>