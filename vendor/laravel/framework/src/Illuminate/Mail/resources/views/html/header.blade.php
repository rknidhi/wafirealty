@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'WafiRealty')
<img src="https://wafirealty.com/public/front/images/wafireality.jpg" class="logo" alt="WafiRealty Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
