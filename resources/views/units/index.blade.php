@foreach($units as $unit)
    <div>
        <h3>{{ $unit->name }}</h3>
        <p>{{ $unit->sigla }}</p>
        <a href="{{ url('units/'.$unit->id.'/edit') }}">Edit</a>
        <form action="{{ url('units/'.$unit->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
