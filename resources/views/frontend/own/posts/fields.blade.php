<div class="form-group">
    @if (config('topics.topic_post_check'))
    <label for="topic">Topic</label>
    <select class="form-control{{ $errors->has('topic') ? ' is-invalid' : '' }}" name="topic" id="topic">
      <option value="">Pick a topic</option>
      @foreach ($topics as $topic)
      <option {{ old('topic', $post->topic_id) == $topic->id ? 'selected' : '' }} value="{{ $topic->id }}">{{ $topic->name }}</option>
      @endforeach
    </select>
    @endif

    @if ($errors->has('topic'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('topic') }}</strong>
        </span>
    @endif
  </div>
<div class="form-group">
    <label class="control-label">Title: </label>
    <input class="post_title form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="the-textarea" maxlength="80" type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="Enter your title" autofocus>
    
    <div class="float-right" id="the-title-count">
        <span id="current_title">0</span>
        <span id="maximum_title">/ 80</span>
    </div>

    @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label class="control-label">Summery: </label>
    {{-- <textarea class="form-control{{ $errors->has('summery') ? ' is-invalid' : '' }}" name="summery" id="ckeditor" cols="30" rows="6">{{ old('summery', $post->summery) }}</textarea> --}}
    <textarea class="post_textarea form-control{{ $errors->has('summery') ? ' is-invalid' : '' }}" id="the-textarea" maxlength="400" name="summery" cols="30" rows="6" autofocus>{{ old('summery', $post->summery) }}</textarea>
    <div class="float-right" id="the-count">
        <span id="current">0</span>
        <span id="maximum">/ 400</span>
    </div>
    @if ($errors->has('summery'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('summery') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label class="control-label">Source Link: </label>
    <input class="form-control{{ $errors->has('source_link') ? ' is-invalid' : '' }}" type="url" name="source_link" value="{{ old('source_link', $post->source_link) }}" placeholder="Enter source link">
    
    @if ($errors->has('source_link'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('source_link') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-secondary btn-sm button">{{ $actionTitle }}</button>
</div>