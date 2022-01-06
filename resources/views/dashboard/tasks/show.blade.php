@foreach($tasks as $task)
    <table>
        <tr>
            <td>{{$task->title}}</td>
        </tr>
    </table>
@endforeach