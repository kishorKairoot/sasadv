@foreach ($all_plans as $key=>$value)
                                    
                                    
    <input type="radio" id="{{ $value->name }}-plan" value="{{ $value->name }}" name="plan" class="hidden" @if(auth()->user()->plan->name == $value->name) checked @endif>
    <label class="border pb-3 pl-1 pr-3" for="{{ $value->name }}-plan" style="cursor: pointer; width: 100%;"> 
        <strong>{{ ucfirst($value->name) }} Plan </strong>
        <br>
        {{ $value->description }}
        <br>
        <strong>
        	@if ($value->name == 'plus')
        		$38.00 every 6 months
        	@elseif($value->name == 'pro')
        		$70.00 / year
        	@else
        		$7.00 / month
        	@endif
        </strong>
    </label>       

@endforeach