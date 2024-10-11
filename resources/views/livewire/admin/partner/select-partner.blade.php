<div class="flex flex-col gap-4">
    <select class="focus:ring-0 focus:ring-zinc-600 focus:outline-none" wire:model.live="selectedPartner" wire:change="updateselectedPartner($event.target.value)">
        <option value="">--Select Partner--</option>
        @foreach ( $partners as $key => $partner )
            <option 
                {{ in_array($partner->id, $s_partners) ? 'disabled' : '' }}
                wire:key="{{$key}}" 
                value="{{$partner->id}}"
            >
                {{$partner->name}}
            </option>
        @endforeach
    </select>

    <div>
        @foreach($s_partners as $key => $partnerId)
            <p wire:key="{{ $key }}" 
                class="capitalize inline-flex justify-evenly shadow items-center m-1 rounded-full bg-warning bg-opacity-20 px-3 py-1 text-sm font-thin text-warning">
                <span>{{ $partner->find($partnerId)->name }}</span>
                <svg wire:click="removePartner({{$partnerId}})" class="w-4 h-4 cursor-pointer hover:text-orange-800 ml-2 hover:font-fold transform duration-300 hover:scale-105" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

            </p>
        @endforeach
    </div>
  
</div>
