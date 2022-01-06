@foreach($cards as $card)
    <table>
        <tr>
            <td>{{$card->title}}</td>
        </tr>
    </table>
@endforeach