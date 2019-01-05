<form role="form" action="{{route('front.fb')}}" method="post">
  @csrf
    <div class="form-group">
      Your Name
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        Your Email
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        Comment
    </div>
    <div class="form-group">
      <textarea rows="4" cols="50" name="comment"></textarea>
    </div>
    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>
</form>