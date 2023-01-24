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
          {{-- @dump($job); --}}
          <h3 class="mt-5">
            <a href="{{route('user.seek.show', ['id'=>$job->id]) }}" class="text-blue-600 text-2xl link-hover cursor-pointer" data-jobid="{{$job->id}}">{{$job->title}}</a>
            <p class="mt-3">{{$job->suburb->name.' - '.$job->suburb->state->name}}</p>
            <p>{{'$'.$job->annual_salary}} per month</p>
            <p>{{'Role: '.$job->subClassification->name}}</p>
            <p class="text-gray-400 mt-3 mb-3">{{ $job->description }}</p>
            <span class="">☆</span>
              {{-- <input type="hidden" name="favorite_job" value="{{ $job->id }}"> --}}
              <button id="save">Save</button>
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
<script>

  ('#save').addEventListener('click', () => {

    // POST通信
    fetch('/my-activity/saved-jobs', {
      method: 'POST',
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        job_offer_id: jobid,
      }),
    }),
  })
  .then((response) => response.json())
  .then((data) => {
    console.log(data)
  })
  .catch((error) => {
    console.log(error)
  });
</script>

</x-navigation-and-search>