<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')
                <!-- ¼ÓÔØ±à¼­Æ÷µÄÈÝÆ÷ -->
        <script id="container" name="{{$name}}" placeholder="{{ trans('admin::lang.input') }} {{$label}}"
                type="text/plain" {!! $attributes !!}>
            {!! old($column, $value) !!}
        </script>
    </div>
</div>