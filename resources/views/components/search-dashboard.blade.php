@props([
    'filters' => [''],
    'placeholder' => '',
    'action' => '#',
    'method' => 'GET',
    'filterName' => 'filter',
    'queryName' => 'q',
])

<div class="my-6">
    <form action="{{ $action }}" method="{{ $method }}">
        <div class="mx-auto w-full max-w-2xl rounded-full border border-primary bg-base-100 px-3 py-2 shadow-md">
            <div class="flex items-center gap-2">
 
                {{-- Dropdown --}}
                <div class="shrink-0">
                    <select name="{{ $filterName }}"
                            class="select select-ghost select-sm rounded-full bg-base-200/60 focus:outline-none">
                        @foreach ($filters as $filter)
                            <option value="{{ \Illuminate\Support\Str::slug($filter) }}">{{ $filter }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Input --}}
                <div class="flex-1">
                    <input
                        name="{{ $queryName }}"
                        type="text"
                        placeholder="{{ $placeholder }}"
                        class="input input-ghost input-sm w-full rounded-full focus:outline-none"
                    />
                </div>

                {{-- Button --}}
                <button
                  type="submit"
                  class="btn btn-sm btn-ghost rounded-full flex items-center justify-center"
                  aria-label="Search"
              >
                  <img
                      src="{{ asset('images/icons/search-icon.svg') }}"
                      alt="Search"
                      class="w-5 h-5 opacity-80 hover:opacity-100 transition"
                  >
                </button>

            </div>
        </div>
    </form>
</div>
