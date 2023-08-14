
@if (!empty($errores))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errores as $error)
        {{ $error }}<br>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="btnCloseAlert">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<script type="text/javascript">
    window.onload = function(){
        let btnCloseAlert = document.getElementById('btnCloseAlert');
        console.log(btnCloseAlert);
        if(btnCloseAlert){
            setTimeout(() => {
                btnCloseAlert.click();
            }, 5000);
            
        }
    }


</script>