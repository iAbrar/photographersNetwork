
<p>current status is: {{$post->status}}</p>
<p>Select a status:</p>

<form action="" method="post">

  <div class="form-row align-items-center">
    <input id="secret" type="hidden" value="{{$post->id}}">
  <select name="status" class="custom-select mr-sm-2" id="list">
    <option selected>Choose...</option>
    <option value="pending">pending</option>
    <option value="approve">approve</option>
    <option value="not approve">not approve</option>
  </select>
  </div>
  <div class="form-row align-items-center my-4">
  <button id="change" type="button" class="btn btn-success mr-3">Change</button>
  <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
  </div>

</form>
