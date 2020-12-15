<div class="form-group">
    <input type="text" name="name" value="{{ $product->name ?? old('name') }}" class="form-control" placeholder="Name">
</div>

<div class="form-group">
    <input type="text" name="url" value="{{ $product->url ?? old('url') }}" class="form-control" placeholder="URL">
</div>

<div class="form-group">
    <input type="text" name="price" value="{{ $product->price ?? old('price') }}" class="form-control" placeholder="Price">
</div>

<div class="form-group">
    <select name="category_id" class="form-control">
        <option value="">Escolha</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" <?php echo ( ($product->category_id) && $product->category_id == $category->id ) ? "selected" : "" ?>>{{ $category->title }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $product->description ?? old('description') }}</textarea> 
</div>

<div class="form-group">
    <input type="submit" value="Save" class="btn btn-primary">
</div>
