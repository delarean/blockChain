<table class="table table-responsive table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>TxHash</th>
        <th>Block</th>
        <th>Age</th>
        <th>From</th>
        <th></th>
        <th>To</th>
        <th>Value</th>
        <th>TxFree</th>
    </tr>
    </thead>
    @foreach($transactions as $transaction)
    <div class="tbody-td">
        <tbody>
        <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-{{$loop->index}}" aria-expanded="false" aria-controls="group-of-rows-1">
            <td>{{$transaction->id}}</td>
            <td>{{$transaction->hash}}</td>
            <td>{{$transaction->block_hash}}</td>
            <td>{{$transaction->age}} назад</td>
            <td>{{$transaction->sender_address}}</td>
            <td><i class="fa fa-arrow-circle-right green" aria-hidden="true"></i></td>
            <td>{{$transaction->recipient_address}}</td>
            <td>{{$transaction->amount}} Rucoin</td>
            <td>{{$transaction->tx_fee}}</td>
        </tr>
        </tbody>
        <tbody id="group-of-rows-{{$loop->index}}" class="collapse">
        <tr>
            <td colspan="9" class="collapse-table">
                <p><span>Партнер:</span><span class="lilac">"МВидео"</span></p>
                <p><span>Товар/услуга:</span>Apple MacBook Pro 15 with Retina display Late 2016 (Intel Core i7 2600 MHz/15.4"/2880x1800/16Gb/256Gb SSD/DVD нет/AMD Radeon Pro 450/Wi-Fi/Bluetooth/MacOS X))</p>
                <p><span>Сумма RUB:</span>32 000.00</p>
                <p><span>Сумма RLC:</span>32.00000</p>
            </td>
        </tr>
        </tbody>
    </div><!--tbody-td-->
    @endforeach
</table>