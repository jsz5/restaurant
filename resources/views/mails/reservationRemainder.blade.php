<div class="well col-sm-8">
    <h4>Rezerwacja w {{config('app.name')}}! <br>
    </h4>
    <p>
      Uprzejmne informuję o jutrzejszej rezerwacj tj. {{$date}} o godzinie {{$time}}.<br>
        Liczba osób: {{$size}}. <br>
        Szczegóły rezerwacji znajdują się na stronie:
      <a href="{{$link}}">{{$link}}.</a><br><br>
        {{config('app.name')}}<br><br>

    </p>
    <br>


</div>




