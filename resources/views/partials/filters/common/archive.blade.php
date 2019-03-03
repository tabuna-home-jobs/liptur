<div class="form-group">
    <label class="font-bold">История:</label>
    <div class="radio m-b-md">
        <label class="i-checks">
            <input type="checkbox" name="archive" value="1" @if($request->get('archive',false)) checked @endif>
            <i></i>
            Показывать записи из архива
        </label>
    </div>
</div>
