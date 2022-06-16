<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/PY0Rgdf/logo.png" class="logo" alt="smart school Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
