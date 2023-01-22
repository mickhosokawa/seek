<x-navigation-and-search>

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
          <input class="border rounded-md ml-5 mt-1" type="text" name="location">
      </div>
      <input type="submit" class="ml-2 px-6 py-1 mt-9 rounded bg-pink-600 text-white font-bold link-hover cursor-pointer" value="SEEK" selected>
    </div>
  </form>
</div>

    {{-- 投稿一覧 --}}
    <div class="bg-gray-100 mt-3 justify-center">
      <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
        @if (isset($jobOffers))
          @foreach ($jobOffers as $job)
          {{-- @dump($job); --}}
          <h3 class="mt-5">
            <a href="{{route('user.seek.show', ['id'=>$job->id]) }}" class="text-blue-600 text-2xl link-hover cursor-pointer">{{$job->title}}</a>
            <p class="mt-3">{{$job->suburb->name.' - '.$job->suburb->state->name}}</p>
            <p>{{'$'.$job->annual_salary}} per month</p>
            <p>{{'Role: '.$job->subClassification->name}}</p>
            <p class="text-gray-400 mt-3 mb-3">{{ $job->description }}</p>
            <span class="">☆</span>
            <span class="text-blue-600 text-xl link-hover cursor-pointer">Save</span>
            <hr class="mt-5 border-t-2">
        </h3>
          @endforeach
            <button class="flex justify-center text-white rounded-md">More...</p>
        @endif  
      </div>
    </div>
</div>


</x-navigation-and-search>