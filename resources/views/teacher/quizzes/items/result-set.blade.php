<ul class="list-group">
    @forelse($results as $result)
        <li class="list-group-item" style="border: 1px solid lightgray !important; cursor: pointer !important;" id="result-item" onclick="setItemDefinition('{{ $result }}')">{{ $result }}</li>
    @empty
        <li class="list-group-item border-bottom"> No results found. </li>
    @endforelse
</ul>
