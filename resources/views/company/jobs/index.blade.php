<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Active job offers
        </h2>
    </x-slot>

    <section>
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-6">
              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Job offer list</h1>
            </div>
            {{-- {{dd(is_null($postedJobOffers), empty($postedJobOffers), $postedJobOffers)}} --}}

            @if (is_null($postedJobOffers) || empty($postedJobOffers))
                <div class="flex justify-center w-full text-lg">
                    <p>No active jobs</p>
                </div>
            @else
            <table class="border-spacing-2 bg-white mx-auto">
                <thead class="">
                    <tr class="border-b py-10">
                        <th class="">Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="mt-10">
                    @foreach ($postedJobOffers as $jobOffer)
                        <td class="md:px-4 py-3">{{ $jobOffer->title }}</td>
                        <td class="md:px-4 py-3"><a href="{{ route('company.job.edit', ['id' => $jobOffer->id]) }}" class="bg-green-500 rounded-md px-4 py-1 text-white text-lg focus:outline-none hover:bg-green-300">Edit</a></td>
                        <form action="{{ route('company.active.job.destroy', ['id' => $jobOffer->id]) }}" method="POST">
                            @csrf
                            <td class="md:px-4 py-3"><button type="submit" class="bg-pink-500 rounded-md px-4 py-1 text-white text-lg focus:outline-none hover:bg-pink-300">Delete</td>
                        </form>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </section>
    
</x-app-layout>

<script>

</script>