<div>
  <header class="border-b border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
      <div class="flex items-center">
        <a href="{{ url('/') }}" class="flex flex-shrink-0">
            <svg class="w-10" viewBox="0 0 95 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(0.090753, 0.930753)" fill-rule="nonzero">
                        <g>
                            <path d="M0.0292472941,45.4392473 C-0.220752706,52.5092473 1.13924729,59.3892473 3.82924729,65.6392473 C5.28924729,69.0192473 9.55924729,70.0992473 12.4392473,67.8092473 L27.5592473,55.7592473 C31.0592473,52.9692473 30.0092473,47.3892473 25.7292473,46.0692473 L7.24924729,40.3592473 C3.74924729,39.2692473 0.159247294,41.7892473 0.0292472941,45.4392473 Z" fill="#EC673B"></path>
                            <path d="M14.8992473,12.6992473 C9.92924729,17.3392473 5.92924729,23.0992473 3.31924729,29.6792473 C1.96924729,33.0792473 4.25924729,36.8292473 7.89924729,37.2392473 L27.1192473,39.4092473 C31.5692473,39.9092473 34.7692473,35.2292473 32.6792473,31.2592473 L23.6592473,14.1592473 C21.9292473,10.9092473 17.5892473,10.1892473 14.8992473,12.6992473 Z" fill="#FFCC07"></path>
                            <path d="M94.0792473,48.6692473 C94.3292473,41.5992473 92.9692473,34.7192473 90.2792473,28.4792473 C88.8192473,25.0992473 84.5492473,24.0192473 81.6692473,26.3092473 L66.5492473,38.3592473 C63.0492473,41.1492473 64.0992473,46.7292473 68.3792473,48.0492473 L86.8592473,53.7592473 C90.3492473,54.8392473 93.9492473,52.3192473 94.0792473,48.6692473 Z" fill="#62398E"></path>
                            <path d="M81.3992473,14.8992473 C76.7592473,9.92924729 70.9992473,5.92924729 64.4192473,3.31924729 C61.0192473,1.96924729 57.2692473,4.25924729 56.8592473,7.88924729 L54.6892473,27.1092473 C54.1892473,31.5592473 58.8692473,34.7592473 62.8392473,32.6692473 L79.9392473,23.6492473 C83.1992473,21.9292473 83.9192473,17.5892473 81.3992473,14.8992473 Z" fill="#35398E"></path>
                            <path d="M79.2092473,81.3992473 C84.1792473,76.7592473 88.1792473,70.9992473 90.7892473,64.4192473 C92.1392473,61.0192473 89.8492473,57.2692473 86.2192473,56.8592473 L66.9992473,54.6892473 C62.5492473,54.1892473 59.3492473,58.8692473 61.4392473,62.8392473 L70.4592473,79.9392473 C72.1792473,83.1992473 76.5192473,83.9192473 79.2092473,81.3992473 Z" fill="#913B8E"></path>
                            <path d="M45.4792473,94.1092473 C52.5492473,94.3392473 59.4292473,92.9692473 65.6692473,90.2592473 C69.0492473,88.7892473 70.1092473,84.5192473 67.8092473,81.6492473 L55.7192473,66.5592473 C52.9192473,63.0592473 47.3492473,64.1292473 46.0292473,68.4092473 L40.3692473,86.8992473 C39.2892473,90.3992473 41.8192473,93.9892473 45.4792473,94.1092473 Z" fill="#B9338A"></path>
                            <path d="M48.0492473,25.7292473 L53.7592473,7.24924729 C54.8392473,3.75924729 52.3192473,0.159247294 48.6692473,0.0292472941 C41.5992473,-0.220752706 34.7192473,1.13924729 28.4792473,3.82924729 C25.0992473,5.28924729 24.0192473,9.55924729 26.3092473,12.4392473 L38.3592473,27.5592473 C41.1492473,31.0592473 46.7192473,30.0092473 48.0492473,25.7292473 Z" fill="#9AC43B"></path>
                            <path d="M12.6992473,79.2092473 C17.3392473,84.1792473 23.0992473,88.1792473 29.6792473,90.7892473 C33.0792473,92.1392473 36.8292473,89.8492473 37.2392473,86.2092473 L39.4092473,66.9892473 C39.9092473,62.5392473 35.2292473,59.3392473 31.2592473,61.4292473 L14.1592473,70.4492473 C10.9092473,72.1792473 10.1892473,76.5192473 12.6992473,79.2092473 Z" fill="#CD3433"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </a>

        <nav class="items-center hidden pl-8 ml-8 space-x-8 text-sm font-medium border-l border-gray-100 md:flex">
          @foreach($this->collections as $collection)
            <a
                href="{{ route('collection.view', $collection->defaultUrl->slug) }}"
            >{{ $collection->translateAttribute('name') }}</a>
          @endforeach
        </nav>
      </div>

      <form action="{{ route('search.view') }}" class="relative mx-12 grow">
        <input type="text" class="w-full px-3 py-2 pl-12 border border-black" name="term" placeholder="Search for products" value="{{ $this->term }}" />
        <button class="absolute top-0 left-0 mt-3 ml-4">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 "
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
            </svg>
        </button>
      </form>

      <div class="flex items-center">
        <div class="items-center hidden divide-x divide-gray-100 lg:flex">
          <a href="" class="block px-6 text-center">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-4 h-4 mx-auto"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
              />
            </svg>
            <span class="block mt-1 text-xs font-medium">Account</span>
          </a>
        </div>

        <div>
            @livewire('components.cart')
        </div>

        <button
          type="button"
          class="inline-flex flex-col items-center justify-center w-16 h-16 bg-gray-100 border-l border-white lg:hidden"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </header>
</div>
