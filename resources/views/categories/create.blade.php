@foreach($categories as $category)
    <div>
        <h3>{{ $category->name }}</h3>
        <a href="{{ url('products/'.$category->id.'/edit') }}">Edit</a>
        <form action="{{ url('products/'.$category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach