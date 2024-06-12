<footer class="bg-[#18181B] shadow bottom-0">
    <ul class="flex flex-wrap items-center justify-center text-white gap-4">
        @foreach ($socialSites as $socialSite)
            <li>
                <a target="blank" href="{{ $socialSite->url }}" target="blank" class="hover:underline">
                    <div class="h-10 w-10">
                        <img src="{{ asset('storage/'.$socialSite->icon) }}" alt="{{ $socialSite->name }}">
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
    <span class="block pb-6 text-sm text-gray-500 text-center dark:text-gray-400">© {{ date('Y') }} All Rights Reserved.</span>
</footer>
