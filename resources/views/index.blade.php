@extends('layouts.base')

@section('content')
<section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
          @if(Session::has('message'))
			<div class="error text-success success">
				{{ Session::get('message') }}
			</div>
			@endif
			@if($errors->has('post'))
				<div class="error text-danger error">
					<li>{{ $errors->first('post') }}</li>
				</div>
			@endif

      

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Whats on your mind?</h3>
              </div>
              <div class="panel-body">
                <form  action="{{ route('post.create') }}" method="post">
                {{csrf_field() }}
                  <div class="form-group" style="margin-right:10px;" >
                  <textarea class="form-control" name="post" id="new-post" rows="5" placeholder="Your Post"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                  
                </form>
              </div>
            </div>
            <h3>What other people say</h3>
            <div class="panel panel-default post">
              <div class="panel-body">
                 <div class="row">
                   <div class="col-sm-11 col-sm-offset-1">
                     
                   @foreach($posts as $post)
                   <article class="post" data-postid='{{ $post->id }}'>
			
                     <div class="bubble">
                       <div class="pointer">
                         <p>{{  $post->body }}</p>
                       </div>
                       </div>
                       <div class="pointer-border"><b><i>Posted by {{ $post->user->first_name }} on {{ $post->created_at }}</i></b></div>
                     <br>
                     <p class="post-actions ">
                     <a href="#" class="like" style="text-decoration:none;"></i>{{ Auth::user()->likes()->where('post_id', $post->id)->first() ?
				               Auth::user()->likes()->where('post_id', $post->id)
				              ->first()->like==1 ? 'You liked this post' : 'Like' :  'Like' }}</a> 
                      |
                      <a href="#" class="like" style="text-decoration:none;">
                         {{ Auth::user()->likes()->where('post_id', $post->id)->first() ?
                          Auth::user()->likes()->where('post_id', $post->id)
                          ->first()->like==0 ? 'You disliked this post' : 'Dislike' :  'Dislike' }}
                      </a> 
                      @if(Auth::user()==$post->user)
				|
                    <a href="#"  id="edit"   style="text-decoration:none;">Edit</a> |
                    <a href="{{ route('post.delete',['post_id'=>$post->id]) }}"  style="text-decoration:none;">Delete</a> 
            				@endif

                      </p>
                     <div class="clearfix"></div>
                  @endforeach


                     </div>
                   </div>
                   </article>
                 </div>
              </div>
            </div>
           
          <div class="col-md-4">
              
          </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	{{csrf_field() }}
				
        	<div class="form-group">
        		<label for="post-body">Edit this post</label>
        		<textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div>
  </div>
</div>

    


<script>
	
	var urlEdit="{{route('edit')}}"
	var urlLike="{{route('like')}}"
	

</script>


@endsection