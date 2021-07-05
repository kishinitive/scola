@csrf
<div class="form-group">
  <label></label>
  <textarea name="body" required class="form-control" rows="10" placeholder="コメント">{{ old('body') }}</textarea>
</div>
<div class="form-group">
  <label for="image">画像登録</label>
  <input type="file" class="form-control-file" name="image" id="image">
</div>
