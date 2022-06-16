<div class="ml-auto">
    <div
        {{$attributes([
        'class'=>"report-box__indicator tooltip cursor-pointer"
       ])}}>

        {{$slot}} <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i>
{{--                             or chevron-up  to do later--}}
    </div>
</div>
</div>
