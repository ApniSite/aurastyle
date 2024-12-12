@auth('staff')
<h2 class="text-lg font-medium">Welcome {{ Auth::guard('staff')->user()->fullName }},</h2>
<form wire:submit="saveChannel" class="bg-white border border-gray-100 rounded-xl">
<div class="flex items-center justify-between h-16 px-6 border-b border-gray-100">
    <h3 class="text-lg font-medium">Channel Details</h3>
</div>
<div class="p-6">
    <div class="grid grid-cols-3 gap-4">
    @foreach ($this->channels as $channel)
    <div>
        <input class="hidden peer" type="radio" name="channel" 
                wire:model.live="chosenChannel"
                value="{{ $channel->id }}" id="{{ $channel->id }}" />
        <label class="flex items-center justify-between p-4 text-sm font-medium border border-gray-100 rounded-lg shadow-sm cursor-pointer peer-checked:border-blue-500 hover:bg-gray-50 peer-checked:ring-1 peer-checked:ring-blue-500"
                for="{{ $channel->id }}">
            <p>{{ $channel->name }}</p>
        </label>
    </div>
    @endforeach
    </div>
</div>
</form>
@endauth