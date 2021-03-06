<table class="table">
    <colgroup>
        <col>
        @for ($i = 1; $i <= 12; $i++)
            <col width="20">
        @endfor
        <col width="100">
    </colgroup>
    <thead>
        <tr>
            <th>Resource</th>
            @for ($i = 1; $i <= 12; $i++)
                <th class="text-center">{{ $i }}</th>
            @endfor
            <th class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resourceHelper->getInvasionResourceTypes() as $resourceType => $resourceName)
            <tr>
                <td>
                    {{ ucfirst($resourceName) }}
                </td>
                @for ($i = 1; $i <= 12; $i++)
                    @php
                        $amount = array_get($data, "incoming.{$resourceType}.{$i}", 0);
                    @endphp
                    <td class="text-center">
                        @if ($amount === 0)
                            -
                        @else
                            {{ number_format($amount) }}
                        @endif
                    </td>
                @endfor
                <td class="text-center">
                    @if ($amountIncoming = array_get($data, "incoming.{$resourceType}"))
                        {{ number_format(array_sum($amountIncoming)) }}
                    @else
                        0
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>