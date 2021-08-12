<div>
    <div class="ui one column stackable center aligned page grid" style="padding: 50px">
        <div class="column twelve wide">
            @if(session()->has('message'))
            <div class="ui negative message">
                {{ session('message') }}
            </div>
            @endif
            <h1 class="ui header"> Track Code </h1>
            <div class="ui action input">
                <input type="text" placeholder="Insert track code" wire:model="trackCode">
                <button wire:click="fetch_from_api" class="ui button">Find my package</button>
            </div>
        </div>
        @if($resData !== null)
            @livewire('table', ['data' => $resData])
        @endif
    </div>
    <script>
        $('.ui.button').on('click', function() {
            $(this).addClass('loading');
        });
    </script>
</div>