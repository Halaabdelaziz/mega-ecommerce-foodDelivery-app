<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container">
    <form action="/resetPassword" method="post">
    @csrf
        
        <div class="form-group">
            <input name="password" type="text" class="form-control form-control-user" id="exampleInputPassword" aria-describedby="textHelp" placeholder="Enter your new password...">
        </div>
        <div class="form-group">
            <input name="password_confirmation" type="text" class="form-control form-control-user" id="exampleInputPassword_confirmation" aria-describedby="textHelp" placeholder="Re-Enter your new password...">
        </div>
        <button class="btn btn-warning" type="submit"> submit</button>
    </form>
</div>