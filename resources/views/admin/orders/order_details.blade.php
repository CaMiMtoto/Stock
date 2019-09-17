<section class="invoice">
    <?php
    $subtotal=0;
    ?>
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> SMS, Inc.
                <small class="pull-right">
                    <strong>Date:</strong>
                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                </small>
            </h2>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>SMS, Inc.</strong><br>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{ $order->customer_name }}</strong><br>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Order ID:</b> #{{ str_pad($order->id,5,'0',STR_PAD_LEFT) }}<br>
            <b>Payment Due:</b> {{ $order->order_date }}<br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <?php $subtotal+=$item->subTotal(); ?>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->menu->name }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ number_format($item->subTotal()) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-6">
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
            <p class="lead">Amount Due <small>{{ $order->order_date }}</small></p>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rwf {{ number_format($subtotal) }}</td>
                    </tr>
                    <tr>
                        <th>Tax (18%)</th>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>Rwf {{ number_format($subtotal) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-sm-12">

            <a href="{{ route('orders.print',['id'=>$order->id]) }}" target="_blank"
               class="btn btn-default pull-right no-print">
                <i class="fa fa-print"></i>
                Print
            </a>
        </div>
    </div>
</section>