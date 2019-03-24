<div class="form-group">
    <label for="topic">Topic</label>
    <select class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" name="topic" id="topic">
      <option value="">Pick a topic</option>
      @foreach ($topics as $topic)
      <option {{ old('topic', $post->topic_id) == $topic->id ? 'selected' : '' }} value="{{ $topic->id }}">{{ $topic->name }}</option>
      @endforeach
    </select>

    @if ($errors->has('topic'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('topic') }}</strong>
        </span>
    @endif
  </div>
<div class="form-group">
    <label class="control-label">Title: </label>
    <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" type="type" name="title" value="{{ old('title', $post->title) }}" placeholder="Enter your title">
    
    @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label class="control-label">Summery: </label>
    <textarea class="form-control{{ $errors->has('summery') ? ' is-invalid' : '' }}" name="summery" id="ckeditor" cols="30" rows="6">{{ old('summery', $post->summery) }}</textarea>
    
    @if ($errors->has('summery'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('summery') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label class="control-label">Source Link: </label>
    <input class="form-control{{ $errors->has('source_link') ? ' is-invalid' : '' }}" type="type" name="source_link" value="{{ old('source_link', $post->source_link) }}" placeholder="Enter source link">
    
    @if ($errors->has('source_link'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('source_link') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-secondary btn-sm button">{{ $actionTitle }}</button>
</div>