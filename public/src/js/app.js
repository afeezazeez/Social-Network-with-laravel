var postId='0'
$('.post').find('.interaction').find('#edit').on('click', function(event){
  event.preventDefault()
  postId= event.target.parentNode.parentNode.dataset['postid'];
   
  var postBody= event.target.parentNode.parentNode.childNodes[1].textContent;
  $('#post-body').val(postBody)
  $('#edit-modal').modal();
 });




 $('#modal-save').on('click', function(){
 	
 	var x=$('#post-body').val()
	$.ajax({
 		method:'get',
 		url:url,
 		data:{
 			body:x,
 			postId:postId
 		}
 	})
 	.done(function(msg){
 		location.reload()
 	})
 });

 
