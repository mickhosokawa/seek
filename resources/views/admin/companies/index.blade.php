<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registered companies list
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          {{-- 企業検索フォーム --}}
            <div class="flex flex-col text-center w-full mb-12">
              <form action="{{ route('admin.companies.search') }}" method="GET">
              <div>
                <input type="text" name="keywords" id="keywords" placeholder="Enter company's name" value=
                "@if (isset($keywords)){{ $keywords }}
              @endif">
              </div>
              <div>
                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
              </div>
            </form>
            </div>

          {{-- 企業情報表示 --}}
          <div class="w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <th class="mb-5">
                <tr class="text-1x1 mb-5">
                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Created_at</th>
                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                  <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                </tr>
              </th>
              <tbody>
                @foreach ($companies as $company)
                <tr>
                  <td class="md:px-4 py-3">{{$company->name}}</td>
                  <td class="md:px-4 py-3">{{$company->email}}</td>
                  <td class="md:px-4 py-3">{{$company->created_at}}</td>
                  <td class="md:px-4 py-3">
                    <button onclick="location.href='{{ route('admin.companies.edit', $company->id) }}'" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded ">Edit</button>
                  </td>
                  <td class="md:px-4 py-3">
                    <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <button onclick="deletePost($this)" data-id={{ $company->id }} class="text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded ">Delete</button>
                    </form>
                  </td>  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
</x-app-layout>