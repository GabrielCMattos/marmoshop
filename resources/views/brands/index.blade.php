@foreach($brands as $brand)
    <div>
        <h3>{{ $brand->name }}</h3>
        <a href="{{ url('brands/'.$brand->id.'/edit') }}">Edit</a>
        <form action="{{ url('brands/'.$brand->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach
