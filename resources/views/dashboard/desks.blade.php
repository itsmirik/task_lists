@foreach($desks as $desk)
    <table>
        <tr>
            <td>{{$desk->title}}</td>
        </tr>
    </table>
@endforeach