@foreach($desks as $desk)
    <table class="container">
        <tr>
            <td>{{$desk->title}}</td>
        </tr>
    </table>
@endforeach