@if(session()->has('success'))
    <div class="success-msg animate__animated"><i class="fas fa-check-circle"></i>{{session('success')}}</div>
@endif
@if(session()->has('error'))
    <div class="error-msg animate__animated"><i class="fas fa-exclamation-circle"></i>{{session('error')}}</div>
@endif