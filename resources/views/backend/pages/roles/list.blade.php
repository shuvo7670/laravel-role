@foreach ($roles as $role)
<tr>
<th scope="row">{{$loop->index+1}}</th>
  <td>{{$role->name}}</td>
  <td>
    -
  </td>
</tr>
@endforeach