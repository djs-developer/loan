{{ Form::label('permission', 'rolepermission') }}
	
@foreach($permission as $key => $val)
	<?php
		$checked = false;
                //as we loop through a list of all itens, we compare to the values retrieved from our pivot table
		if(in_array($val->id, $rolepermission)) $checked = true;
	?>
	{{ Form::checkbox('permission[]', $val->id, $checked) }}
	{{ $val->name}}
			
@endforeach