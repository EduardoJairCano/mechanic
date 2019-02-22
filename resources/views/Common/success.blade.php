{{-- Para revisar si el status al llegar a esta opcion es adecuado, basta con implementar un if-endif
    para obtener dicho status y en dado caso mostrar dicha alerta--}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
