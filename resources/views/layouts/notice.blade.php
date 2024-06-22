<div class="Notice">
    <h1 class="Notice">Notice</h1>
    @foreach ($counts as $type => $count)
        <p>Type: {{ $type }}, Count: {{ $count }}</p>
    @endforeach
</div>
