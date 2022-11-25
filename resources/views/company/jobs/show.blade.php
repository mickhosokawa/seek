<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Active job offer detail
        </h2>
    </x-slot>

   <div class="bg-blue-100">
        <div class="bg-white max-w-screen-md m-auto rounded-md mt-1 mb-1 p-3 w-11/12">
            <h1 class="mt-5 text-2xl font-bold">{{$jobOfferDetail->title}}</h1>
            {{-- <p class="mt-3 text-xl">{{$jobOffer->role}}</p>
            <p class="mt-3 text-lg">{{$jobOffer->location}}</p>
            <p class="text-lg">${{$jobOffer->salary}} per hour</p>
            <p class="text-lg">{{$jobOffer->categories}} > Administrative Assistants</p>
            <p class="text-gray-400 mt-3 mb-3">{{$jobOffer->created_at}}</p>
            <a href="#" class="btn btn-primary bg-pink-500 rounded-md">Quick apply</a>
            <hr class="mt-5 border-t-2"> --}}
        </div>
    </div>
</x-app-layout>