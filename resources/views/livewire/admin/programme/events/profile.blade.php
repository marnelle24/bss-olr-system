<div>
    <h4 class="text-2xl font-bold text-black dark:text-white mb-8 capitalize">About the Event</h4>
    {{-- @dump($bss_event) --}}
    <table class="w-full border-collapse border border-gray-300 bg-white">
        <tbody>
            @foreach($bss_event as $key => $value)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $key }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if(is_numeric($value) && strpos($key, 'price') !== false)
                            SGD{{ number_format($value, 2) }}
                        @elseif(strtotime($value) !== false && strpos($key, 'date') !== false)
                            {{ \Carbon\Carbon::parse($value)->format('F j, Y, g:i A') }}
                        @else
                            {{ is_array($value) ? json_encode($value) : $value }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
