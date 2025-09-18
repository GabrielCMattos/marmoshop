<form action="{{ url('units') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="sigla" placeholder="Sigla" required>
    <button type="submit">Create Unit</button>
</form>