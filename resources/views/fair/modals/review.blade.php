<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $booking->fairActivity->activity->name }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <img src="{{ asset('img/' . $booking->fairActivity->activity->image_path) }}" class="card-img-top rounded-3"
    alt="{{ $booking->fairActivity->activity->name }}">
    <form id="form_valorar_actividad" action="{{ route('review.store') }}" method="POST">
        @csrf
        <input type="hidden" name="booking_id" id="booking_id" value="{{ $booking->id }}">
        <div class="rating-box">
            <header>Valoració</header>
            <div class="stars">
                @php
                    $score = $review ? $review->score : 0;
                @endphp
            
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $score)
                        <i class="fa-solid fa-star active"></i>
                    @else
                        <i class="fa-solid fa-star"></i>
                    @endif
                @endfor
            </div>
        </div>
        <br>
        <div class="rating-box">
            <header>Comentari</header>
            <textarea id="comment" name="comment" rows="4" maxlength="200"
                @if ($review) value="{{ $review->comment }}" @endif>@if($review){{ $review->comment }}@endif</textarea>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
    <button id="submit_form_valorar_actividad" class="btn btn-primary">Valorar</button>
</div>

<script>
    // icons star
    var stars = document.querySelectorAll(".stars i");
    var starsCount = {{$review ? $review->score : 0}};
    stars.forEach((star, index1) => {
        star.addEventListener("click", () => {
            stars.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("active") : star.classList.remove(
                    "active");
            });
            starsCount = index1 + 1;
        });
    });
    //* icons star

    // submit_form_valorar_actividad
    var submit_form_valorar_actividad = document.getElementById("submit_form_valorar_actividad");
    submit_form_valorar_actividad.addEventListener('click', function() {
        var parametros = {
            "_token": "{{ csrf_token() }}",
            "booking_id": document.getElementById("booking_id").value,
            "comment": document.getElementById("comment").value,
            "score": starsCount,
        };
        $.ajax({
            data: parametros,
            url: "{{ route('review.store') }}",
            type: 'POST',
            success: function(response) {
                location.reload();
            }
        });
    });
    //* submit_form_valorar_actividad
</script>
