var postId='0'
var postBodyElement=null
$('.post').find('.post-actions').find('#edit').on('click', function(event){
	
  event.preventDefault()
  postBodyElement=event.target.parentNode.parentNode.childNodes[1];
  var postBody=postBodyElement.textContent 
  console.log(postBody)
    postId= event.target.parentNode.parentNode.dataset['postid'];
	 $('#post-body').val(postBody)
     $('#edit-modal').modal();
 });




 $('#modal-save').on('click', function(){
 	
 	var x=$('#post-body').val()
	$.ajax({
 		method:'get',
 		url:urlEdit,
 		data:{
 			body:x,
 			postId:postId
 		}
 	})
 	.done(function(msg){
		$(postBodyElement).text(msg['new_body']);
		$('#edit-modal').modal('hide');

 	})
 });


$('.like').on('click', function(event){
	event.preventDefault()
	postId= event.target.parentNode.parentNode.dataset['postid'];
  
	var isLike= event.target.previousElementSibling== null
	$.ajax({
		method:'get',
		url:urlLike,
		data:{
			isLike:isLike,
			postId:postId
		}
	})
	.done(function(msg){
		event.target.innerText=isLike ? event.target.innerText=='Like' ? 'You like this post' : 'Like' : event.target.innerText=='Dislike' ? 'You disliked this post' : 'Dislike'
		if (isLike) {
			event.target.nextElementSibling.innerText='Dislike'
		}
		else{
			event.target.previousElementSibling.innerText='Like'
		}
	})
}) 





























 
