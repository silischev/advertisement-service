<select class="form-control" name="{{ $name }}">
    @foreach ($variants as $variant)
        <option>{{ $variant }}</option>
    @endforeach
</select>