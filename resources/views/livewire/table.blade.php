<div>
    <div class="ui attached info message">
        <i class="close icon"></i>
        <div class="header">
            Type: {{ $data['0']->nome }}
        </div>
        <ul class="list">
            <li> From: {{ $data['0']->categoria }}</li>
            <li> Code: {{ $data['0']->numero }}</li>
        </ul>
    </div>
    <div class="ui styled accordion">
        @foreach($data as $item)
            @foreach(array_reverse($item->evento, true) as $evento)
                <div class="title">
                    <i class="arrow down icon"></i>
                    {{ $evento->data }} - {{ $evento->descricao }}
                </div>
                <div class="content">
                    <div class="ui info message">
                        <div class="header">
                            Local: {{ $evento->unidade->local }}
                        </div>
                        <ul class="list">
                            @if(isset($evento->destino) && count($evento->destino) > 0)
                                <li> Indo para : {{ $evento->destino['0']->local }} </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @endforeach
        @endforeach
    </ul>
    <script>
        $('.ui.accordion')
            .accordion();
    </script>
</div>