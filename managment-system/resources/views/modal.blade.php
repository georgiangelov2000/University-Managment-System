<form action="">
    <select class="form-select" multiple aria-label="multiple select example" name="course_id[]">
        {{-- @foreach ($courses as $item)
            <option {{ in_array($item->id, $courseSubjects) ? 'selected' : '' }} value="{{ $item->id }}">
                {{ $item->title }}</option>
        @endforeach --}}
    </select>
</form>
