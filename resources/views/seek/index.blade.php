<x-navigation-and-search>

{{-- 検索欄 --}}
<div class="flex flex-row bg-blue-800">
  <form action="{{route('user.seek.list')}}" method="get">
    <div class="flex justify-center max-w-screen-md m-5 w-11/12">
      <div>
        <p class="text-white text-bold text-lg ml-5">What</p>
        <input class="border rounded-md ml-5 mt-1" placeholder="Enter Keywords" type="search" name="search" value=
          "@if (isset($search)) {{ $search }} @endif">
      </div>

      {{-- 職種選択 --}}
      <div class="mt-7">
        <select name="classifications" class="border rounded-md ml-5 mt-1" >
          {{-- <option value="@if(isset($sub_classification->id)){{ $sub_classification->id }}">
            @if ((isset($sub_classification->id))){{  }}
            
          @endif</option> --}}
          @foreach ($classifications as $classification)
          <optgroup label="{{ $classification->name }}">
            @foreach ($classification->subClassification as $sub_classification)
                <option value="{{ $sub_classification->id }}" @if(old('classifications') == $sub_classification->id) selected @endif>
                  {{ $sub_classification->name }} 
                </option>
            @endforeach
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
</div>


</x-navigation-and-search>