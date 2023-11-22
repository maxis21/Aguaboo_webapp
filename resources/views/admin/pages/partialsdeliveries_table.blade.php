<!-- Order Table -->

  <table class="table table-striped">
    <thead class="thead-dark">
        <tr style="background-color: blue;">
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Total Quantity</th>
          <th scope="col">Total Amount</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td class="pt-4 pb-4 p-2">{{$order->id}}</td>
                <td class="pt-4 pb-4 p-2">{{ $order->customer->customer_name }}</td>
                <td class="pt-4 pb-4 p-2">{{$order->order_purok}} {{$order->order_barangay}} {{$order->order_city}}</td>
                <td class="pt-4 pb-4 p-2">{{$order->total_quantity}}</td>
                <td class="pt-4 pb-4 p-2">{{$order->total_price}}</td>
                <td class="pt-4 pb-4 p-2">
                        <div class="btn-group">
                            
                            <div class="ml-1"><a href="{{ route('update.deliveries', ['id' => $order]) }}" type="button" class="btn btn-primary">Update</a></div>
                        </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $orders->links() }} 