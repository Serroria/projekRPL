<table class="table-order">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>
      
    </thead>
    <tbody>

        @foreach ($orders as $order )
        
        <tr>

            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_email }}</td>
            <td>{{ ucfirst($order->status)}}</td>
            <td>

                <form action="{{ route ('orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" onchange="this.form.submit()">
                    <option value="pending" {{ $order->status == 'pending'?'selected' : '' }}>Pending</option>
                    <option value="dikirim" {{ $order->status == 'dikirim'?'selected' : '' }}>Dikirim</option>
                    <option value="dibatalkan" {{ $order->status == 'dibatalkan'?'selected' : '' }}>Dibatalkan</option>
                    </select>
                </form>



            </td>
        </tr>

        @endforeach

    </tbody>
</table>