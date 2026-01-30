@props(['items' => []])

@if(count($items) > 0)
<nav class="bg-gray-50 border-b border-gray-100 py-4" aria-label="Breadcrumb">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <ol class="flex items-center space-x-2 text-sm">
            <!-- Home Link -->
            <li>
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-akaat-blue transition-colors flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Home
                </a>
            </li>

            @foreach($items as $index => $item)
                <li class="flex items-center">
                    <!-- Separator -->
                    <svg class="h-4 w-4 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    
                    @if($index === count($items) - 1)
                        <!-- Current page (last item) -->
                        <span class="text-akaat-blue font-medium" aria-current="page">
                            {{ $item['title'] }}
                        </span>
                    @else
                        <!-- Intermediate links -->
                        @if(isset($item['url']) && $item['url'] !== '#')
                            <a href="{{ $item['url'] }}" class="text-gray-500 hover:text-akaat-blue transition-colors">
                                {{ $item['title'] }}
                            </a>
                        @else
                            <span class="text-gray-500">{{ $item['title'] }}</span>
                        @endif
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
@endif