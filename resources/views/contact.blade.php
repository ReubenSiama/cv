@extends('layouts.main', [
    'title' => 'Contact',
    'description' => 'Contact Reuben Siama for any inquiries or collaborations.'
    ])

@section('content')
    @if (session('success'))
        @include('components.alert', ['message' => session('success')])
    @endif
    <div class="mx-5 md:mx-auto md:container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-20">
            <form action="{{ Route('contact') }}" method="POST"
            class="rounded-lg bg-[url('/public/images/comb-small.png')] bg-center bg-no-repeat">
                <div class="hidden">
                    <label for="yourName">Leave this field blank:</label>
                    <input type="text" name="yourName" id="yourName" />
                </div>
                <div class="bg-black bg-opacity-90 p-8 md:p-14 rounded-lg">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Name</label>
                            <input name="name" type="name" id="name" class="bg-pencil border border-pencil text-gray-200 text-sm rounded-lg focus:ring-pencil focus:border-pencil block w-full p-2.5" required />
                        </div> 
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Email</label>
                            <input name="email" type="email" id="email"  class="bg-pencil border border-pencil text-gray-200 text-sm rounded-lg focus:ring-pencil focus:border-pencil block w-full p-2.5" required />
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Subject</label>
                        <input name="subject" type="text" id="subject"  class="bg-pencil border border-pencil text-gray-200 text-sm rounded-lg focus:ring-pencil focus:border-pencil block w-full p-2.5" required />
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Message</label>
                        <textarea name="message" type="password" id="message"  class="bg-pencil border border-pencil text-gray-200 text-sm rounded-lg focus:ring-pencil focus:border-pencil block w-full p-2.5" rows=7 required></textarea>
                    </div>
                    <button type="submit" class="text-white bg-pencil hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>
            <div class="p-10 content-center">
                <h1 class="text-2xl font-bold text-gray-200 dark:text-white text-center mb-6">{{ $contact->title }}</h1>
                <div class="text-xl">
                    {!! $contact->value !!}
                </div>
            </div>
        </div>
    </div>
@endsection
