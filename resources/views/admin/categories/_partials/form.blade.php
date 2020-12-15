@csrf

<div class="form-group">
    <input type="text" name="title" value="{{ $category->title ?? old('title') }}" class="form-control" placeholder="Title">
</div>

<div class="form-group">
    <input type="text" name="url" value="{{ $category->url ?? old('url') }}" class="form-control" placeholder="url">
</div>

<div class="form-group">
    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $category->description ?? old('description') }}</textarea> 
</div>

<div class="form-group">
    <input type="submit" value="Enviar" class="btn btn-success">
</div>
