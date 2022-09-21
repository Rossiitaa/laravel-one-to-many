<div>
    <div class="form-group mb-2">
        <label for="title">Title</label>
        <input required name="title" type="text" class="form-control" id="title" placeholder="Enter title"
            value="{{old('title', $post->title)}}">
        @error('title')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"
            class="form-control">{{old('content', $post->content)}}</textarea>
        @error('content')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group mb-2">
        <label for="image">Image Url</label>
        <input required name="image" type="text" class="form-control" id="image" placeholder="Enter image url"
            value="{{old('image', $post->image)}}">
        @error('image')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="w-100 text-center">
        <button type="submit" class="btn btn-primary text-light">Submit</button>
    </div>
</div>